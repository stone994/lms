<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', [ProgramController::class, 'index']);

Route::resource('programs',ProgramController::class);
Route::resource('subjects',SubjectController::class);
Route::resource('teachers',TeacherController::class);
Route::resource('students',StudentController::class);