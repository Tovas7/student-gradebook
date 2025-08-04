<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'score',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function calculateLetterGrade()
    {
        if ($this->score >= 90) return 'A';
        if ($this->score >= 80) return 'B';
        if ($this->score >= 70) return 'C';
        if ($this->score >= 60) return 'D';
        return 'F';
    }

    public function calculateGpaPoint()
    {
        if ($this->score >= 90) return 4.0;
        if ($this->score >= 80) return 3.0;
        if ($this->score >= 70) return 2.0;
        if ($this->score >= 60) return 1.0;
        return 0.0;
    }
}