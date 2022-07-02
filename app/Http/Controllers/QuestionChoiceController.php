<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionChoiceController extends Controller
{
    public function createanswerchoice()
    {
        $questionchoices = request()->get('question_choice');

        dd($questionchoices);

        foreach($questionchoices as $questionchoice)
        {
           $newanswerchoice = AnswerChoice::create();

           $newanswerchoice->update([
            'answer_choice' => $questionchoice,
            'survey_question_id' => $SurveyQuestion->id          
           ]);
        }


    }
}
