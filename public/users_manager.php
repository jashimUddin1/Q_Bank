<?php
// public/users_sqlite_crud.php
// CRUD for EXISTING Laravel SQLite: ../database/database.sqlite (Password included, bcrypt, show/hide toggle)

declare(strict_types=1);

// ---- Path to existing Laravel sqlite ----
$dbFile = realpath(__DIR__ . '/../database/database.sqlite');

if (!$dbFile || !file_exists($dbFile)) {
    http_response_code(500);
    echo "SQLite file not found. Expected: " . htmlspecialchars(__DIR__ . '/../database/database.sqlite');
    exit;
}

$dsn = 'sqlite:' . $dbFile;

// ---- Helpers ----
function h(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function redirect(string $to): void { header("Location: $to"); exit; }
function nowSql(): string { return date('Y-m-d H:i:s'); }

try {
    $pdo = new PDO($dsn, null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo "DB connection failed: " . h($e->getMessage());
    exit;
}

// ---- Detect table + columns ----
function tableInfo(PDO $pdo, string $table): array {
    $stmt = $pdo->query("PRAGMA table_info($table)");
    return $stmt->fetchAll();
}

$colsInfo = tableInfo($pdo, 'users');
if (!$colsInfo) {
    http_response_code(500);
    echo "Table 'users' not found in this database.sqlite.";
    exit;
}
$cols = array_map(fn($r) => $r['name'], $colsInfo);

$hasId        = in_array('id', $cols, true);
$hasName      = in_array('name', $cols, true);
$hasEmail     = in_array('email', $cols, true);
$hasPassword  = in_array('password', $cols, true);
$hasCreatedAt = in_array('created_at', $cols, true);
$hasUpdatedAt = in_array('updated_at', $cols, true);

if (!$hasId || !$hasEmail || !$hasPassword) {
    http_response_code(500);
    echo "This script expects users table to have at least: id, email, password. Detected: " . h(implode(', ', $cols));
    exit;
}

$action = $_POST['action'] ?? $_GET['action'] ?? 'list';
$errors = [];
$flash  = $_GET['msg'] ?? '';
$q      = trim((string)($_GET['q'] ?? ''));

// ---- Data helpers ----
function getUser(PDO $pdo, int $id): ?array {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function getUsers(PDO $pdo, string $q = ''): array {
    if ($q !== '') {
        $like = '%' . $q . '%';
        $clauses = [];
        $params = [];
        foreach (['name', 'email'] as $c) {
            try {
                $pdo->query("SELECT $c FROM users LIMIT 1");
                $clauses[] = "$c LIKE ?";
                $params[] = $like;
            } catch (Throwable $e) {}
        }
        if ($clauses) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE " . implode(" OR ", $clauses) . " ORDER BY id DESC");
            $stmt->execute($params);
            return $stmt->fetchAll();
        }
    }
    return $pdo->query("SELECT * FROM users ORDER BY id DESC")->fetchAll();
}

// ---- POST actions ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = (string)($_POST['action'] ?? '');

    if ($action === 'create') {
        $name     = trim((string)($_POST['name'] ?? ''));
        $email    = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');
        $confirm  = (string)($_POST['password_confirm'] ?? '');

        if ($hasName && $name === '') $errors[] = "Name is required.";
        if ($email === '') $errors[] = "Email is required.";
        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is not valid.";

        if ($password === '') $errors[] = "Password is required.";
        if ($password !== '' && strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
        if ($password !== $confirm) $errors[] = "Password confirmation does not match.";

        if (!$errors) {
            try {
                $fields = [];
                $ph = [];
                $vals = [];

                if ($hasName) { $fields[]='name'; $ph[]='?'; $vals[]=$name; }
                $fields[]='email'; $ph[]='?'; $vals[]=$email;

                $hash = password_hash($password, PASSWORD_BCRYPT);
                $fields[]='password'; $ph[]='?'; $vals[]=$hash;

                $now = nowSql();
                if ($hasCreatedAt) { $fields[]='created_at'; $ph[]='?'; $vals[]=$now; }
                if ($hasUpdatedAt) { $fields[]='updated_at'; $ph[]='?'; $vals[]=$now; }

                $sql = "INSERT INTO users (" . implode(',', $fields) . ") VALUES (" . implode(',', $ph) . ")";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($vals);

                redirect(basename(__FILE__) . '?msg=' . urlencode('User created successfully.'));
            } catch (Throwable $e) {
                $errors[] = "Create failed: " . $e->getMessage();
            }
        }
        $action = 'new';
    }

    if ($action === 'update') {
        $id       = (int)($_POST['id'] ?? 0);
        $name     = trim((string)($_POST['name'] ?? ''));
        $email    = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');
        $confirm  = (string)($_POST['password_confirm'] ?? '');

        if ($id <= 0) $errors[] = "Invalid user ID.";
        if ($hasName && $name === '') $errors[] = "Name is required.";
        if ($email === '') $errors[] = "Email is required.";
        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email is not valid.";

        if ($password !== '') {
            if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters.";
            if ($password !== $confirm) $errors[] = "Password confirmation does not match.";
        }

        if (!$errors) {
            try {
                $sets = [];
                $vals = [];

                if ($hasName) { $sets[] = "name = ?"; $vals[] = $name; }
                $sets[] = "email = ?"; $vals[] = $email;

                if ($password !== '') {
                    $hash = password_hash($password, PASSWORD_BCRYPT);
                    $sets[] = "password = ?"; $vals[] = $hash;
                }

                if ($hasUpdatedAt) { $sets[] = "updated_at = ?"; $vals[] = nowSql(); }

                $vals[] = $id;

                $sql = "UPDATE users SET " . implode(', ', $sets) . " WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($vals);

                redirect(basename(__FILE__) . '?msg=' . urlencode('User updated successfully.'));
            } catch (Throwable $e) {
                $errors[] = "Update failed: " . $e->getMessage();
            }
        }
        $action = 'edit';
        $_GET['id'] = (string)$id;
    }

    if ($action === 'delete') {
        $id = (int)($_POST['id'] ?? 0);
        if ($id <= 0) redirect(basename(__FILE__) . '?msg=' . urlencode('Invalid user ID.'));
        try {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);
            redirect(basename(__FILE__) . '?msg=' . urlencode('User deleted.'));
        } catch (Throwable $e) {
            redirect(basename(__FILE__) . '?msg=' . urlencode('Delete failed: ' . $e->getMessage()));
        }
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Users CRUD (Laravel SQLite + Password)</title>
  <style>
    body { font-family: system-ui, Arial; background:#f6f7fb; margin:0; }
    .container { max-width: 980px; margin: 28px auto; padding: 0 16px; }
    .card { background:#fff; border-radius:14px; padding:18px; box-shadow: 0 8px 24px rgba(0,0,0,.06); }
    h1 { margin:0 0 8px; font-size: 22px; }
    .muted { color:#666; font-size:13px; }
    .btn { display:inline-block; padding:10px 12px; border-radius:10px; border:1px solid #e2e6ef; background:#fff; text-decoration:none; color:#111; cursor:pointer; }
    .btn.primary { background:#111; color:#fff; border-color:#111; }
    .btn.danger { background:#c0392b; color:#fff; border-color:#c0392b; }
    table { width:100%; border-collapse: collapse; margin-top:10px; }
    th, td { text-align:left; padding:10px; border-bottom:1px solid #eef1f7; font-size:14px; vertical-align:top; }
    th { font-size:12px; text-transform:uppercase; letter-spacing:.06em; color:#555; }
    input { width:100%; padding:10px 12px; border-radius:10px; border:1px solid #e2e6ef; }
    .grid { display:grid; gap:10px; grid-template-columns: 1fr 1fr; }
    .actions { display:flex; gap:8px; align-items:center; flex-wrap:wrap; }
    .flash { padding:10px 12px; border-radius:10px; background:#ecf9f1; border:1px solid #bfe7cd; color:#0a5b2c; margin-bottom:12px; }
    .err { padding:10px 12px; border-radius:10px; background:#fff3f3; border:1px solid #f2bcbc; color:#8a1f1f; margin-bottom:12px; }
    form.inline { display:inline; }
    code { background:#f1f3f9; padding:2px 6px; border-radius:8px; }
    .pw-wrap { position: relative; }
    .pw-wrap input { padding-right: 44px; }
    .pw-toggle {
      position:absolute; right:10px; top:50%; transform:translateY(-50%);
      border:none; background:#fff; cursor:pointer; font-size:16px;
      width:34px; height:34px; border-radius:10px; border:1px solid #e2e6ef;
    }
    .pw-toggle:active { transform:translateY(-50%) scale(0.98); }
    @media (max-width: 720px) { .grid { grid-template-columns: 1fr; } }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>Users CRUD (Laravel SQLite + Password)</h1>
      <div class="muted">DB: <code><?=h($dbFile)?></code></div>
      <div class="muted">Detected columns: <code><?=h(implode(', ', $cols))?></code></div>
      <div style="height:12px"></div>

      <div class="actions" style="justify-content:space-between;">
        <div class="actions">
          <a class="btn" href="<?=h(basename(__FILE__))?>">Users</a>
          <a class="btn primary" href="<?=h(basename(__FILE__))?>?action=new">+ New User</a>
        </div>
      </div>

      <div style="height:10px"></div>

      <?php if ($flash): ?><div class="flash"><?=h($flash)?></div><?php endif; ?>
      <?php if ($errors): ?>
        <div class="err"><b>Fix these:</b>
          <ul style="margin:8px 0 0 18px;">
            <?php foreach ($errors as $e): ?><li><?=h($e)?></li><?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ($action === 'new'): ?>
        <form method="post" style="display:grid; gap:10px;">
          <input type="hidden" name="action" value="create">

          <div class="grid">
            <?php if ($hasName): ?>
              <div>
                <div class="muted">Name</div>
                <input name="name" value="<?=h((string)($_POST['name'] ?? ''))?>">
              </div>
            <?php endif; ?>
            <div>
              <div class="muted">Email</div>
              <input name="email" value="<?=h((string)($_POST['email'] ?? ''))?>">
            </div>
          </div>

          <div class="grid">
            <div>
              <div class="muted">Password</div>
              <div class="pw-wrap">
                <input id="pw1" type="password" name="password" autocomplete="new-password">
                <button class="pw-toggle" type="button" data-toggle="#pw1" aria-label="Show/Hide password">👁️</button>
              </div>
            </div>
            <div>
              <div class="muted">Confirm Password</div>
              <div class="pw-wrap">
                <input id="pw2" type="password" name="password_confirm" autocomplete="new-password">
                <button class="pw-toggle" type="button" data-toggle="#pw2" aria-label="Show/Hide confirm password">👁️</button>
              </div>
            </div>
          </div>

          <div class="actions">
            <button class="btn primary" type="submit">Create</button>
            <a class="btn" href="<?=h(basename(__FILE__))?>">Cancel</a>
          </div>

          <div class="muted">
            Password plaintext save হয় না—bcrypt hash হয়ে DB তে যায়।
          </div>
        </form>

      <?php elseif ($action === 'edit'): ?>
        <?php
          $id = (int)($_GET['id'] ?? 0);
          $user = $id ? getUser($pdo, $id) : null;
        ?>
        <?php if (!$user): ?>
          <div class="err">User not found.</div>
        <?php else: ?>
          <form method="post" style="display:grid; gap:10px;">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?=h((string)$user['id'])?>">

            <div class="grid">
              <?php if ($hasName): ?>
                <div>
                  <div class="muted">Name</div>
                  <input name="name" value="<?=h((string)($_POST['name'] ?? $user['name'] ?? ''))?>">
                </div>
              <?php endif; ?>
              <div>
                <div class="muted">Email</div>
                <input name="email" value="<?=h((string)($_POST['email'] ?? $user['email'] ?? ''))?>">
              </div>
            </div>

            <div class="muted">Change password (optional)</div>
            <div class="grid">
              <div class="pw-wrap">
                <input id="pw3" type="password" name="password" placeholder="New password (leave empty to keep same)" autocomplete="new-password">
                <button class="pw-toggle" type="button" data-toggle="#pw3" aria-label="Show/Hide new password">👁️</button>
              </div>
              <div class="pw-wrap">
                <input id="pw4" type="password" name="password_confirm" placeholder="Confirm new password" autocomplete="new-password">
                <button class="pw-toggle" type="button" data-toggle="#pw4" aria-label="Show/Hide confirm new password">👁️</button>
              </div>
            </div>

            <div class="actions">
              <button class="btn primary" type="submit">Save</button>
              <a class="btn" href="<?=h(basename(__FILE__))?>">Back</a>

              <form class="inline" method="post" onsubmit="return confirm('Delete this user?');">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?=h((string)$user['id'])?>">
                <button class="btn danger" type="submit">Delete</button>
              </form>
            </div>
          </form>
        <?php endif; ?>

      <?php elseif ($action === 'view'): ?>
        <?php
          $id = (int)($_GET['id'] ?? 0);
          $user = $id ? getUser($pdo, $id) : null;
        ?>
        <?php if (!$user): ?>
          <div class="err">User not found.</div>
        <?php else: ?>
          <?php foreach ($user as $k => $v): ?>
            <div style="margin:6px 0;">
              <b><?=h((string)$k)?>:</b>
              <?php if ($k === 'password'): ?>
                <span class="muted">(hashed)</span> <code><?=h(substr((string)$v, 0, 25))?>...</code>
              <?php else: ?>
                <?=h((string)$v)?>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
          <div class="actions" style="margin-top:10px;">
            <a class="btn primary" href="<?=h(basename(__FILE__))?>?action=edit&id=<?=h((string)$user['id'])?>">Edit</a>
            <a class="btn" href="<?=h(basename(__FILE__))?>">Back</a>
          </div>
        <?php endif; ?>

      <?php else: ?>
        <form method="get" class="grid" style="margin-bottom:10px;">
          <input type="hidden" name="action" value="list">
          <div>
            <div class="muted">Search</div>
            <input name="q" value="<?=h($q)?>" placeholder="name/email...">
          </div>
          <div class="actions" style="align-self:end;">
            <button class="btn" type="submit">Search</button>
            <a class="btn" href="<?=h(basename(__FILE__))?>">Reset</a>
          </div>
        </form>

        <?php $users = getUsers($pdo, $q); ?>
        <div class="muted"><?=count($users)?> user(s) found.</div>

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <?php if ($hasName): ?><th>Name</th><?php endif; ?>
              <th>Email</th>
              <th>Password</th>
              <?php if ($hasCreatedAt): ?><th>Created</th><?php endif; ?>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!$users): ?>
              <tr><td colspan="10" class="muted">No users found.</td></tr>
            <?php endif; ?>

            <?php foreach ($users as $u): ?>
              <tr>
                <td><?=h((string)($u['id'] ?? ''))?></td>
                <?php if ($hasName): ?><td><?=h((string)($u['name'] ?? ''))?></td><?php endif; ?>
                <td><?=h((string)($u['email'] ?? ''))?></td>
                <td class="muted">(hashed)</td>
                <?php if ($hasCreatedAt): ?><td><?=h((string)($u['created_at'] ?? ''))?></td><?php endif; ?>
                <td class="actions">
                  <a class="btn" href="<?=h(basename(__FILE__))?>?action=view&id=<?=h((string)$u['id'])?>">View</a>
                  <a class="btn primary" href="<?=h(basename(__FILE__))?>?action=edit&id=<?=h((string)$u['id'])?>">Edit</a>
                  <form class="inline" method="post" onsubmit="return confirm('Delete this user?');">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?=h((string)$u['id'])?>">
                    <button class="btn danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>

    </div>
  </div>

  <script>
    // Password show/hide toggler
    document.querySelectorAll('[data-toggle]').forEach(btn => {
      btn.addEventListener('click', () => {
        const sel = btn.getAttribute('data-toggle');
        const input = document.querySelector(sel);
        if (!input) return;
        input.type = (input.type === 'password') ? 'text' : 'password';
        btn.textContent = (input.type === 'password') ? '👁️' : '🙈';
      });
    });
  </script>
</body>
</html>
