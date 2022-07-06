<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponses;
use App\Models\QuestionChoice;
use App\Models\SurveyResponseAnswers;
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
            
            

            $ResponseData = [
                'survey_id' => $survey->id,
                'student_id' => $StudentId,
                
            ];

            $NewResponse = SurveyResponses::firstOrCreate($ResponseData);

            
            $NewAnswerData = [
                'survey_question_id' => $SurveyQuestion->id,
                'survey_response_id' => $NewResponse->id

            ];


            
            $NewAnswer = SurveyResponseAnswers::updateOrCreate($NewAnswerData);


           $NewAnswerChoiceData = [
            'survey_response_answer_id' => $newanser->id,
            'answer_choice' => $questionchoice,
            'survey_question_id' => $SurveyQuestion->id          
           ];

           $NewAnswerChoice = AnswerChoice::firstOrCreate($NewAnswerChoiceData);


            dd($NewAnswer);

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
