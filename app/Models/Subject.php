<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function student_classes(): BelongsToMany
    {
        return $this->belongsToMany(StudentClass::class, 'student_class_subject', 'subject_id', 'student_class_id');
    }

    
}
