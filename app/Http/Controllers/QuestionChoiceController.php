<?php

namespace App\Http\Controllers;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponses;
use App\Models\QuestionChoice;
use App\Models\SurveyResponseAnswers;
use App\Models\AnswerChoice;
use Illuminate\Pagination\Paginator;

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

        return redirect()->back()->withInput()->withSuccess('Answer Saved Successfully');

    }


    public function questionchoiceeditor(SurveyQuestion $SurveyQuestion, QuestionChoice $QuestionChoice)
    {
       

      

        $SurveyQuestionId = SurveyQuestion::where('id', $SurveyQuestion->id)->pluck('id');

        $QuestionChoices = QuestionChoice::whereIn('survey_question_id', $SurveyQuestionId)->paginate(7);

     

        return view('questionchoiceeditor')->with(['QuestionChoices' => $QuestionChoices]);

    }

    public function questionchoiceedit(SurveyQuestion $SurveyQuestion, QuestionChoice $QuestionChoice)
    {

        return view('questionchoiceedit')->with(['QuestionChoice' => $QuestionChoice, 'QuestionChoice' => $QuestionChoice]);

    }

    public function updatequestionchoice(QuestionChoice $QuestionChoice)
    {
    
        $SurveyQuestionId = $QuestionChoice->survey_question_id;

      

        $data = request()->validate([
            'question_choice' => 'required',           
        ]);


        $QuestionChoice->update($data);

        

        return redirect()->route('/questionchoiceedit/$SurveyQuestionId')->with('success', 'QuestionChoice Edited Successfully');
    }
}
