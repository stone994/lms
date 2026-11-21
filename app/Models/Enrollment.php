<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Enrollment extends Model
{
    protected $fillable = [
        'student_id',
        'program_id',
        'semester_id',
        'session',
        'status',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function subjects(){
        return $this->belongsToMany(Subject::class,'enrollment_subjects')
        ->withTimestamps();
    }
}
