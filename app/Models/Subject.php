<?php // app/Models/subjects.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{

    protected $table = 'subjects';
    protected $fillable = [
        'class_id',
        'sub_name',
    ];

    public function academicClass(): BelongsTo
    {
        return $this->belongsTo(academicClass::class, 'class_id');
    }
}
