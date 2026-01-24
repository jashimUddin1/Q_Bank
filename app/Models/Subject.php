<?php // app/Models/subjects.php

namespace App\Models;

use App\Models\Chapter;
use App\Models\AcademicClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{

    protected $table = 'subjects';
    protected $fillable = [
        'class_id',
        'sub_name',
    ];

    public function Chapter():HasMany
    {
        return $this->hasMany(Chapter::class, 'subject_id', 'id');
    }
    public function AcademicClass(): BelongsTo
    {
        return $this->belongsTo(AcademicClass::class, 'class_id', 'id');
    }
}
