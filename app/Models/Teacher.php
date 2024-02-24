<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(StudentClass::class, 'student_class_teacher', 'teacher_id', 'student_class_id');
    }

}
