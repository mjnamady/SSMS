<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentGroup extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }
}
