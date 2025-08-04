<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/instructors', [AdminController::class, 'storeInstructor'])->name('admin.instructors.store');
        Route::post('/admin/courses', [AdminController::class, 'storeCourse'])->name('admin.courses.store');
        Route::post('/admin/assign-course', [AdminController::class, 'assignCourse'])->name('admin.courses.assign');
    });

    // Instructor Routes
    Route::middleware('role:instructor')->group(function () {
        Route::get('/instructor/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
        Route::get('/instructor/courses/{course}/grades', [InstructorController::class, 'showGrades'])->name('instructor.grades.show');
        Route::put('/instructor/courses/{course}/grades', [InstructorController::class, 'updateGrades'])->name('instructor.grades.update');
    });

    // Student Routes
    Route::middleware('role:student')->group(function () {
        Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';