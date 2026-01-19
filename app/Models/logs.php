<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'class_id',
        'subject_id',
        'chapter_id',
        'description',
        'old_text',
        'new_text',
        'action',
        'action_user',
        'action_time',
    ];
}
