<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function College()
    {
        return $this->belongsTo(College::class);
    }

    public function Course()
    {
        return $this->hasMany(Course::class);
    }
}
