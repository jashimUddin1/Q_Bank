<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class MCQ_Question extends Model
{
    protected $table = 'mcq_questions';

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->insert_by = Auth::id();
        });
    }
    
    protected $fillable = [
        'class_id',
        'subject_id',
        'chapter_id',
        'lesson_id',
        'questions',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'right_answer',
        'level',
        'type',
        'year',
        'insert_by',
    ];

   
}
