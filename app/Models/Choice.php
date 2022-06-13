<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    public function SurveyQuestion()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function SurveyResponseAnswers()
    {
        return $this->belongsTo(SurveyResponseAnswers::class);
    }
}
