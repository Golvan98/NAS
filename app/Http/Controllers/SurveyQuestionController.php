<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponseAnswers;
use App\Models\Student;
use App\Models\SurveyResponses;
use App\Http\Controllers\SurveyResponsesController;

class SurveyQuestionController extends Controller
{
    public function surveyform(Survey $survey)
    {
        
        $student = auth()->user()->id;

        

        $survey = survey::where('id', $survey->id)->pluck('id');

        
       
        $SurveyQuestions = SurveyQuestion::whereIn('survey_id', $survey)->paginate(1);

        $nextpage = $SurveyQuestions->nextPageURL();

      
        
        return view('/surveyform')->with(['survey' => $survey, 'SurveyQuestions' => $SurveyQuestions, 'student' => $student, 'nextpage' => $nextpage]);
    }

    public function createanswer(Survey $survey, SurveyQuestion $SurveyQuestion, SurveyResponseAnswers $SurveyResponseAnswers, Student $student, SurveyResponses $SurveyResponses, )
    {
       

      
     

        $student = auth()->user()->id;
        
       
        $responsedata = [
            'survey_id' => $survey->id,
            'student_id' => $student,
            
        ];

        $newresponse = SurveyResponses::create($responsedata);

        $newresponseid = $newresponse->id;
        $SurveyQuestionid = $SurveyQuestion->id;

        

        $answer = request()->validate([
            'answer' => 'required',           
        ]);

        

        $newanswer = SurveyResponseAnswers::create($answer); 

       
        $newanswerupdated = SurveyResponseAnswers::where('id', $newanswer->id)->update(['survey_response_id' => $newresponse->id, 'survey_question_id' => $SurveyQuestionid]);
        
        $SurveyQuestionz = SurveyQuestion::whereIn('survey_id', $survey)->paginate(1);

        $currentpage = $SurveyQuestionz->currentPage();

        $url = url()->previous();

        

        return redirect($url);
    }
}
