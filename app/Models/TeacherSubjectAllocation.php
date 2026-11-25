<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherSubjectAllocation extends Model
{
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'semester_id',
        'section',
        'session',
    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);

    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
}
