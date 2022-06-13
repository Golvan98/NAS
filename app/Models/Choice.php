<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;


    protected $fillable =[  'survey_response_answer_id', 'survey_question_id', 'choice'];

    public function SurveyQuestion()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function SurveyResponseAnswers()
    {
        return $this->belongsTo(SurveyResponseAnswers::class);
    }
}
