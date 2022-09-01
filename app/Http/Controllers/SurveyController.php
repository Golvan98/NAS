<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponseAnswers;
use App\Models\SurveyResponses;
use App\Models\Student;
use App\Models\Course;
use App\Models\Department;
use App\Models\AnswerChoice;
use Illuminate\Pagination\Paginator;

class SurveyController extends Controller
{
    public function surveyeditor(Survey $survey)
    {
        return view('/surveyeditor')->with(['survey' => $survey]);            
    }

    public function surveycreator(Survey $survey)
    {
        return view('surveycreator');
    }

    public function createsurvey(Survey $survey)
    {
        $data = request()->validate([
            'name' => 'required'
        ]);
        
        $newsurvey = Survey::create($data);

        return redirect()->route('allsurveys')->with('success', 'Survey Created Successfully');
    }

    public function updatesurvey(Survey $survey)
    {
        
        if(request()->has('delete'))
        {
           $survey->delete();

           
           return redirect()->back()->with('success' , 'Survey Deleted Successfully');
     

        }


        $data = request()->validate([
            'name' => 'required'
        ]);
        
        $survey->update($data);

        return redirect()->route('allsurveys')->with('success', 'Survey Updated Successfully');

    }

    public function deletesurvey(Survey $survey)
    {
    
        $survey->delete();

        return redirect()->back()->with('success' , 'Survey Deleted Successfully');
     
    }





    
    public function testsurvey(Survey $survey)
    {
      

        return view('/testsurvey')->with(['survey' => $survey]);
        
    }

    public function listsurvey(Survey $survey)
    {      

        $survey = survey::where('id', '<>', 0 )->paginate(4);


        return view('/surveylist')->with(['surveys' =>$survey]);
    }
    

    public function viewsurveys(Survey $surveys)

    {
        $surveys = Survey::all();

        return view('viewsurveys')->with(['surveys' => $surveys]);
    }


    public function surveycategory($survey)
    {

        $specificsurveyid = Survey::where('name', $survey)->pluck('id');

        

        $questioncategories = SurveyQuestion::where('survey_id', $specificsurveyid)->pluck('category')->unique();

        

        return view('surveycategory')->with(['survey' => $survey, 'questioncategories' => $questioncategories]);
    }

    public function viewsurveyresult($questioncategory) 
    {

        $BSCA = Course::all()->where('coursecode', '=', 'BSCA')->pluck('id');
        $BSCS = Course::all()->where('coursecode', '=', 'BSCS')->pluck('id');

        $Anxiety = AnswerChoice::all()->whereIn('answer_choice', ['Afraid I might not fit in MSU-IIT', 'Afraid to speak up in class', 'Afraid of failing in subjects', 'Anxious to approach teachers' ])->pluck('survey_response_answer_id');

        
       $AnxietySurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $Anxiety)->pluck('survey_response_id');

       $SurveyResponse = SurveyResponses::all()->whereIn('id', $AnxietySurveyResponseAnswers)->pluck('student_id');

       $AnxiousStudents = Student::all()->whereIn('id', $SurveyResponse);

       
        $CCSDepartments = Department::all()->whereIn('departmentname', ['Computer Application', 'Computer Science', 'Information Technology', 'Information Systems'])->pluck('id');

        $CCSCourses = Course::all()->whereIn('department_id', $CCSDepartments)->pluck('id');

       $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses);

       

        dd($AnxiousCCSStudents);


      
dd($CCSCourses);
        

        $CoeDepartments = Department::all()->where('college_id', '=', 1)->pluck('id');
       
        $CoeCourses = Course::all()->whereIn('department_id', $CoeDepartments)->pluck('id');

        $CoeStudents = Student::all()->whereIn('course_id', $CoeCourses)->pluck('firstname');

        
        
        $BSCAcount = Student::all()->whereIn('course_id', $BSCA)->count();
        $BSCScount = Student::all()->whereIn('course_id', $BSCS)->count();
        

        return view('viewsurveyresult')->with(['questioncategory' => $questioncategory, 'BSCAcount' => $BSCAcount, 'BSCScount' => $BSCScount]);
    }


    public function surveyresults(SurveyQuestion $surveyquestion)
    {
        $surveyquestioncategories = SurveyQuestion::query()->distinct()->pluck('category');

        return view('/surveyresults')->with(['surveyquestion' => $surveyquestion, 'surveyquestioncategories' => $surveyquestioncategories]);
    }

    public function surveydata($surveyquestioncategory)
    {
       
        return view('/surveydata')->with(['surveyquestioncategory' => $surveyquestioncategory]);

        
    }
}
