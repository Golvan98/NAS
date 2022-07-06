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

            $SurveyQuestionId = $SurveyQuestion->id;


            $ResponseData = [
                'survey_id' => $survey->id,
                'student_id' => $StudentId,
                
            ];

            $NewResponse = SurveyResponses::firstOrCreate($ResponseData);
        
            
            $NewAnswerData = [
                'survey_response_id' => $NewResponse->id,
                'survey_question_id' => $SurveyQuestionId,
                'answer' => 'multiple_choice'
            ];

    
            $NewAnswer = SurveyResponseAnswers::firstOrCreate($NewAnswerData);
   
           $NewAnswerChoiceData = [
            'survey_response_answer_id' => $NewAnswer->id,
            'answer_choice' => $questionchoice,      
           ];

           $NewAnswerChoice = AnswerChoice::updateOrCreate($NewAnswerChoiceData);


        }

        $wew = AnswerChoice::all();

        dd($wew);

    }
}
