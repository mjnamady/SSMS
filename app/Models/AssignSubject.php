<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Expr\FuncCall;

class AssignSubject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function studentClass(){
        return $this->hasOne(StudentClass::class, 'id', 'class_id');
    }

    public function studentSubject(): HasOne
    {
        return $this->hasOne(Subject::class,'id', 'subject_id');
    }
}
