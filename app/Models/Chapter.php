<?php // app/Models/Chapter.php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    protected $table = 'chapters';
    protected $fillable = [
        'subject_id',
        'chapter_name',
    ];



    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function Lessons():HasMany
    {
        return $this->hasMany(Lesson::class, 'chapter_id', 'id');
    }
}
