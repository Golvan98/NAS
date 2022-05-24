<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\ResponseAnswers;

class SurveyQuestionController extends Controller
{
    public function surveyform(Survey $surveys)
    {
        

        $surveys = survey::where('id', $surveys->id)->pluck('id');

       
        $SurveyQuestions = SurveyQuestion::whereIn('survey_id', $surveys)->paginate(4);

        
        return view('/surveyform')->with(['surveys' => $surveys, 'SurveyQuestions' => $SurveyQuestions]);
    }
}
