<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin & Student Routes
Route::middleware(['auth', 'role:admin,student'])->group(function () {
    Route::get('/programs/data', [ProgramController::class, 'getPrograms'])->name('programs.data');
    Route::get('/programs/{id}/print', [ProgramController::class, 'printPdf'])->name('programs.print');
    Route::resource('programs', ProgramController::class);
    Route::get('/semesters/data', [SemesterController::class, 'getSemester'])->name('semesters.data');

    Route::resource('semesters', SemesterController::class);

});

// Admin & Teacher Routes
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::get('/subjects/data',[SubjectController::class, 'getSubjects']
    )->name('subjects.data');

    Route::get('/teachers/data',
        [TeacherController::class, 'getTeacher']
    )->name('teachers.data');

    Route::resource('teachers', TeacherController::class);
    Route::resource('subjects', SubjectController::class);
});
Route::middleware(['auth', 'role:admin,teacher,student'])->group(function () {

    Route::get('/students/data',
        [StudentController::class, 'getStudents']
    )->name('students.data');

    Route::get('/students/{id}/print',
        [StudentController::class, 'printPdf']
    )->name('students.print');

    Route::resource('students', StudentController::class);

});

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/academics/data',[AcademicController::class, 'getAcademic'])->name('academics.data');
    
    Route::resource('academics', AcademicController::class);

});

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/enrollments/data',[EnrollmentController::class, 'getEnrollment']
    )->name('enrollments.data');
    Route::resource('enrollments', EnrollmentController::class);

});

require __DIR__.'/auth.php';