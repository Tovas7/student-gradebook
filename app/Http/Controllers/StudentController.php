<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    /**
     * Display the student dashboard.
     * Fetches grades and GPA for the authenticated student.
     */
    public function dashboard()
    {
        $student = Auth::user();
        $grades = $student->grades()->with('course')->get();
        $gpa = $student->calculateGpa();

        return view('student.dashboard', compact('grades', 'gpa'));
    }

    /**
     * Generates and downloads a PDF grade report for the authenticated student.
     */
    public function generateReport()
    {
        $student = Auth::user();
        $grades = $student->grades()->with('course')->get();
        $gpa = $student->calculateGpa();

        // Load the 'student.report' view with the student's data
        $pdf = Pdf::loadView('student.report', compact('student', 'grades', 'gpa'));

        // Return the generated PDF as a download with a dynamic filename
        return $pdf->download('grade_report_' . $student->id . '.pdf');
    }
}