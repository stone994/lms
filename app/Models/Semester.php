<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Semester extends Model
{
    protected $guarded = [];

    // Add this relationship method:
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
}