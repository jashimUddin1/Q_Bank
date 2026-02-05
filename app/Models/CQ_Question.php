<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\AcademicClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CQ_Question extends Model
{
    protected $table = 'cq_questions';
    protected static function booted()
    {
        static::creating(function($model){
            $model->insert_by = Auth::id();
        });
    }

     protected $fillable = [
        'class_id',
        'subject_id',
        'chapter_id',
        'lesson_id',
        'proviking_img',
        'proviking',
        'question_a',
        'question_b',
        'question_c',
        'question_d',
        'level',
        'type',
        'board_name',
        'year',
        'insert_by',
    ];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class, 'class_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function Chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
}
