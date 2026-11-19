<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Enrollment extends Model
{
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }

    public function semester(){
        return $this->belongsTo(Semester::class);
    }
}
