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
use Illuminate\Support\Facades\DB;


class SurveyQuestionController extends Controller
{


    public function questionlist(Survey $survey)
    {
        return view('surveyquestionlist')->with(['survey' => $survey]);
    }


    public function questioneditor(SurveyQuestion $surveyquestion)
    {

       $surveyid = $surveyquestion->survey_id;   
        return view('/questioneditor')->with(['surveyquestion' => $surveyquestion, 'surveyid' => $surveyid]);
    }

    public function updatequestion(SurveyQuestion $surveyquestion)
    {
        $data = request()->validate(
            [
               'question' => 'required',
            ]);

            $survey = $surveyquestion->survey_id;
   
        $surveyquestion->update($data);
        
       return redirect()->route('surveylist', [$survey])->with('success', 'Question Edited Successfully');

          // return redirect('/home')->with('success', 'Question Edited Successfully');
    }

    public function deletequestion(SurveyQuestion $surveyquestion)
    {
        $survey = $surveyquestion->survey_id;

        $surveyquestion->delete();

        return redirect()->route('surveylist', [$survey])->with('success', 'Question Deleted Successfully');
     
    }

    public function createquestion()
    {
        $data = request()->validate(
            [
               'question' => 'required',
               'survey_id' => $survey->id
            ]);


        
    }

   





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

        $newresponse = SurveyResponses::firstOrCreate($responsedata);

        $newresponseid = $newresponse->id;
        $SurveyQuestionid = $SurveyQuestion->id;

        

        $answer = request()->validate([
            'answer' => 'required',           
        ]);

       
           $checkanswer = DB::table('survey_response_answers')
                        ->where('survey_response_id', '=', $newresponseid)
                        ->where('survey_question_id', '=', $SurveyQuestionid)->exists();

            if($checkanswer)

                    {
                    
                                        $updatedanswer =  DB::table('survey_response_answers')
                                        ->where('survey_response_id', '=', $newresponseid)
                                        ->where('survey_question_id', '=', $SurveyQuestionid)->update($answer);

                    }

            else
            {
                    $newanswer = SurveyResponseAnswers::create($answer);

                    $newanswerid = $newanswer->id;        
                    $newanswerupdated = SurveyResponseAnswers::where('id', $newanswerid)->update(['survey_response_id' => $newresponse->id, 'survey_question_id' => $SurveyQuestionid]);
                    
                    $anewanswer = DB::table('survey_response_answers')
                    ->where('id', '=', $newanswerid);    
            }
               

        return redirect()->back()->withInput()->withSuccess('Answer Saved Successfully');


        

        /* return redirect('texthere/' . $variablehere->id '?page=' . $page->id);  THE RESULT OF THIS IS /texthere/varaiableid?page=pageid*/
    }
}
