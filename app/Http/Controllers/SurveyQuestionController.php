<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponseAnswers;
use App\Models\Student;

class SurveyQuestionController extends Controller
{
    public function surveyform(Survey $survey)
    {
        
        $student = auth()->user()->id;

        

        $survey = survey::where('id', $survey->id)->pluck('id');

        
       
        $SurveyQuestions = SurveyQuestion::whereIn('survey_id', $survey)->paginate(4);

        
        return view('/surveyform')->with(['survey' => $survey, 'SurveyQuestions' => $SurveyQuestions, 'student' => $student]);
    }

    public function createanswer(SurveyResponseAnswers $SurveyResponseAnswers, Survey $survey, Student $student)
    {
        $student = auth()->user()->id;
        
       
        
        

        $response = SurveyReponse::create([
            'survey_id' => $survey->id,
            'student_id' => $student
        ]);

        dd($response->id);
        $answer = request()->validate([
            'answer' => 'required',
            'password' => 'required',
        ]);

        SurveyResponseAnswers::create($answer);

        return view('home');


    }
}
