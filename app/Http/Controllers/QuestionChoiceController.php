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

            $StudentId = auth()->user()->id;
            
            

            $responsedata = [
                'survey_id' => $survey->id,
                'student_id' => $StudentId,
                
            ];

            $NewResponse = SurveyResponse::create($responsedata);

            dd($NewResponse);



           $newanswerchoice = AnswerChoice::create();
            $newanswer = Answer::create();

            $newanswer->update([
                'survey_question_id' => $SurveyQuestion->id
            ]);

           $newanswerchoice->update([
            'survey_response_answer_id' => $newanser->id,
            'answer_choice' => $questionchoice,
            'survey_question_id' => $SurveyQuestion->id          
           ]);
        }

        $wew = AnswerChoice::all();

        dd($wew);

    }
}
