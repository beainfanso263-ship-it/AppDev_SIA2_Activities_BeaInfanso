<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizRecord extends Model
{
    protected $fillable = [
        'student_name',
        'subject',
        'quiz1',
        'quiz2',
        'total',
        'remarks',
        'image'
    ];
}