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
    
}
