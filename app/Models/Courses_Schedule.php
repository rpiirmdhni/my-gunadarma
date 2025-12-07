<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses_Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'course_time',
        'course_id',
        'lecturer_id',
        'classroom_id',
    ];

    // Relasi ke Course
    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id');
    }

    // Relasi ke Classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
