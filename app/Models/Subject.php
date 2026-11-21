<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'code',
    'credit_hour',
    ];
    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class);
    }
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function semesters(): BelongsToMany
    {
        return $this->belongsToMany(Semester::class)
        ->withPivot('subject_type')
        ->withTimestamps();
    }
    public function enrollments(){
        return $this->belongsToMany(Enrollment::class,'enrollment_subjects')
        ->withTimestamps();
    }
    
}
