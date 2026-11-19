<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }
    use HasFactory;
    protected $fillable = [
        'lms_account',
        'name',
        'email',
        'cnic',
        'path',
    ];
}
