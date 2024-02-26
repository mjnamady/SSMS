<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function class(): HasOne
    {
        return $this->hasOne(StudentClass::class, 'id', 'class_id')->withDefault();
    }


    public function group(): BelongsTo
    {
        return $this->belongsTo(StudentGroup::class);
    }

}
