<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use PhpParser\Builder\Class_;

class StudentClass extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // public function student(): BelongsTo
    // {
    //     return $this->belongsTo(Student::class, 'class_id', 'id');
    // }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'student_class_teacher', 'student_class_id', 'teacher_id');
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'student_class_subject', 'student_class_id', 'subject_id');
    }

}