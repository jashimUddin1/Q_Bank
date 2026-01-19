<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Logs;

class AcademicClass extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        // ✅ CREATE
        static::created(function (self $class) {
            Logs::create([
                'class_id'     => $class->id,
                'description'  => 'Academic class created',
                'old_text'     => null,
                'new_text'     => json_encode([
                    'name'      => $class->name,
                    'slug'      => $class->slug,
                    'is_active' => (bool) $class->is_active,
                ], JSON_UNESCAPED_UNICODE),
                'action'       => 'created',
                'action_user'  => Auth::id() ?? 0,
                'action_time'  => now(),
            ]);
        });

        // ✅ UPDATE
        static::updated(function (self $class) {
            $changes = $class->getChanges();
            unset($changes['updated_at']);

            $trackFields = ['name', 'slug', 'is_active'];

            $old = [];
            $new = [];

            foreach ($trackFields as $field) {
                if (array_key_exists($field, $changes)) {
                    $old[$field] = $class->getOriginal($field);
                    $new[$field] = $class->{$field};
                }
            }

            // meaningful change na hole Logs na
            if (empty($new)) {
                return;
            }

            Logs::create([
                'class_id'     => $class->id,
                'description'  => 'Academic class updated',
                'old_text'     => json_encode($old, JSON_UNESCAPED_UNICODE),
                'new_text'     => json_encode($new, JSON_UNESCAPED_UNICODE),
                'action'       => 'updated',
                'action_user'  => Auth::id() ?? 0,
                'action_time'  => now(),
            ]);
        });

        // ✅ SOFT DELETE (Trash)
        static::deleted(function (self $class) {
            // SoftDeletes ব্যবহার করলে normal delete = trash
            if (method_exists($class, 'isForceDeleting') && $class->isForceDeleting()) {
                return; // forceDeleted event আলাদা আছে
            }

            Logs::create([
                'class_id'     => $class->id,
                'description'  => 'Academic class moved to trash',
                'old_text'     => json_encode([
                    'name'      => $class->name,
                    'slug'      => $class->slug,
                    'is_active' => (bool) $class->is_active,
                ], JSON_UNESCAPED_UNICODE),
                'new_text'     => null,
                'action'       => 'deleted',
                'action_user'  => Auth::id() ?? 0,
                'action_time'  => now(),
            ]);
        });

        // ✅ RESTORE
        static::restored(function (self $class) {
            Logs::create([
                'class_id'     => $class->id,
                'description'  => 'Academic class restored from trash',
                'old_text'     => null,
                'new_text'     => json_encode([
                    'name'      => $class->name,
                    'slug'      => $class->slug,
                    'is_active' => (bool) $class->is_active,
                ], JSON_UNESCAPED_UNICODE),
                'action'       => 'restored',
                'action_user'  => Auth::id() ?? 0,
                'action_time'  => now(),
            ]);
        });

        // ✅ FORCE DELETE (Permanent)
        static::forceDeleted(function (self $class) {
            Logs::create([
                'class_id'     => $class->id,
                'description'  => 'Academic class permanently deleted',
                'old_text'     => json_encode([
                    'name'      => $class->name,
                    'slug'      => $class->slug,
                    'is_active' => (bool) $class->is_active,
                ], JSON_UNESCAPED_UNICODE),
                'new_text'     => null,
                'action'       => 'force deleted',
                'action_user'  => Auth::id() ?? 0,
                'action_time'  => now(),
            ]);
        });
    }
}
