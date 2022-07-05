<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\QuestionChoice;
use App\Models\AnswerChoice;

use Illuminate\Http\Request;

class QuestionChoiceController extends Controller
{
    public function createanswerchoice(Survey $survey, SurveyQuestion $SurveyQuestion)
    {
        $questionchoices = request()->get('question_choice');

      

        foreach($questionchoices as $questionchoice)
        {
           $newanswerchoice = AnswerChoice::create();

           $newanswerchoice->update([
            'answer_choice' => $questionchoice,
            'survey_question_id' => $SurveyQuestion->id          
           ]);
        }

        $wew = AnswerChoice::all();

        dd($wew);

    }
}
