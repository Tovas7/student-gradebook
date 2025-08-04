<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $instructors = User::where('role', 'instructor')->get();
        $courses = Course::with('instructor')->get();
        $students = User::where('role', 'student')->get();
        return view('admin.dashboard', compact('instructors', 'courses', 'students'));
    }

    public function storeInstructor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'instructor',
        ]);

        return back()->with('status', 'Instructor created successfully!');
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:courses',
            'credits' => 'required|integer|min:1|max:6',
        ]);

        Course::create([
            'name' => $request->name,
            'code' => $request->code,
            'credits' => $request->credits,
        ]);

        return back()->with('status', 'Course created successfully!');
    }

    public function assignCourse(Request $request)
    {
        $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'instructor_id' => ['required', 'exists:users,id', Rule::in(User::where('role', 'instructor')->pluck('id'))],
        ]);

        $course = Course::find($request->course_id);
        $course->instructor_id = $request->instructor_id;
        $course->save();

        return back()->with('status', 'Course assigned successfully!');
    }
}