<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class);
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(ExamType::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(StudentYear::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
