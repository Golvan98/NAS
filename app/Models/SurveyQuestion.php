<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $table = 'survey_questions';

    protected $fillable =['student_id', 'survey_id', 'answer', 'survey_response_id', 'question', 'type', 'category'];
    
    public function Survey ()
    {
        return $this->belongsTo(Survey::class);
    }

    public function SurveyResponseAnswers()
    {
        return $this->hasMany(SurveyResponseAnswers::class);
    }

    public function QuestionChoice()
    {
        return $this->hasMany(QuestionChoice::class);
    }
}
