<?php //app/Models/AcademicClass.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class AcademicClass extends Model
{

    protected $table = 'academic_classes';

    protected $fillable = ['name'];

    public function subjects():HasMany
    {
        return $this->hasMany(Subject::class, 'class_id');
    }
    
}
