<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    use HasFactory;

    protected $fillable =['survey_question_id', 'choice'];

    public function SurveyQuestion()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

}
