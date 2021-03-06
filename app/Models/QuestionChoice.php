<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    use HasFactory;

    protected $table = 'question_choices';

    protected $fillable =['survey_question_id', 'question_choice'];

    public function SurveyQuestion()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

}
