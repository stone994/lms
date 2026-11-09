<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;

Route::middleware(['auth', 'role:admin,student'])->group(function () {
    Route::resource('programs', ProgramController::class);
    Route::resource('semesters', SemesterController::class);
});

Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    Route::resource('subjects', SubjectController::class);
    Route::resource('teachers', TeacherController::class);
});

Route::middleware(['auth', 'role:admin,teacher,student'])->group(function () {
    Route::resource('students', StudentController::class);

Route::get('/students/{id}/print', [StudentController::class, 'printPdf'])
    ->name('students.print');
});

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

require __DIR__.'/auth.php';