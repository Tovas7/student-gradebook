<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // IMPORTANT: Added 'role' to the fillable array
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function calculateGpa()
    {
        $totalCredits = 0;
        $totalGradePoints = 0;

        foreach ($this->grades as $grade) {
            if ($grade->score !== null) {
                $credits = $grade->course->credits;
                $gpaPoint = $grade->calculateGpaPoint();

                $totalCredits += $credits;
                $totalGradePoints += $gpaPoint * $credits;
            }
        }

        return $totalCredits > 0 ? round($totalGradePoints / $totalCredits, 2) : 0;
    }
}