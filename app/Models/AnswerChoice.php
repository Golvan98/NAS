<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerChoice extends Model
{
    use HasFactory;

    protected $fillable =['survey_response_answer_id', 'answer_choice'];

    public function SurveyResponseAnswers()
    {
        return $this->belongsTo(SurveyResponseAnswers::class);
    }
}
