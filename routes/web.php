<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('layout/welcome');
});

Route::resource('program',ProgramController::class);
Route::resource('subject',subjectController::class);
Route::resource('teacher',TeacherController::class);
Route::resource('student',StudentController::class);