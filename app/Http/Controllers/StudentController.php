<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user();
        $grades = $student->grades()->with('course')->get();
        $gpa = $student->calculateGpa();

        return view('student.dashboard', compact('grades', 'gpa'));
    }
}