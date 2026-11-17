<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AcademicController;

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

    Route::resource('semesters', SemesterController::class);

    Route::get('/semester/subjects/{id}',
    [SemesterController::class, 'getSubjects']);
});

// Admin & Teacher Routes
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::resource('subjects', SubjectController::class);
    Route::resource('teachers', TeacherController::class);
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

require __DIR__.'/auth.php';