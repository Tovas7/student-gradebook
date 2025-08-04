<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function dashboard()
    {
        $courses = Auth::user()->courses;
        return view('instructor.dashboard', compact('courses'));
    }

    public function showGrades(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403, 'You are not assigned to this course.');
        }

        $grades = Grade::where('course_id', $course->id)->with('student')->get();
        return view('instructor.grades.edit', compact('course', 'grades'));
    }

    public function updateGrades(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403, 'You are not assigned to this course.');
        }

        $validatedData = $request->validate([
            'grades' => 'required|array',
            'grades.*.id' => 'required|exists:grades,id',
            'grades.*.score' => 'nullable|integer|min:0|max:100',
        ]);

        foreach ($validatedData['grades'] as $gradeData) {
            $grade = Grade::find($gradeData['id']);
            $grade->score = $gradeData['score'];
            $grade->save();
        }

        return back()->with('status', 'Grades updated successfully!');
    }
}