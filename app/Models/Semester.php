<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'semester_number',
        'total_subjects',
        'subject_name',
        'type',
    ];
    

   }
