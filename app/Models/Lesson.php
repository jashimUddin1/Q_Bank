<?php // app/Models/Lesson.php

namespace App\Models;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
        'chapter_id',
        'lesson_name',
    ];

    public function Chapter():BelongsTo
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }
}
