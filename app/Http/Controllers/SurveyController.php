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
          /*query for all Departments in CCS */$CCSDepartments = Department::all()->whereIn('departmentname', ['Computer Application', 'Computer Science', 'Information Technology', 'Information Systems'])->pluck('id');
       /*query for all Courses in CCS */$CCSCourses = Course::all()->whereIn('department_id', $CCSDepartments)->pluck('id');

       $AnxietyAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Afraid I might not fit in MSU-IIT', 'Afraid to speak up in class', 'Afraid of failing in subjects', 'Anxious to approach teachers', 'Panicking during tests' ])->pluck('survey_response_answer_id');
       $AnxietySurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $AnxietyAnswers)->pluck('survey_response_id');
       $AnxietySurveyResponse = SurveyResponses::all()->whereIn('id', $AnxietySurveyResponseAnswers)->pluck('student_id');
       $AnxiousStudents = Student::all()->whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
       $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who answered atleast 1 Anxiety problem

       $MotivationAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Lacking Motivation'])->pluck('survey_response_answer_id');
       $MotivationSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $MotivationAnswers)->pluck('survey_response_id');
       $MotivationSurveyResponse = SurveyResponses::all()->whereIn('id', $MotivationSurveyResponseAnswers)->pluck('student_id');
       $LackOfMotivationStudents = Student::all()->whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
       $LackOfMotivationCCSStudents = $LackOfMotivationStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who answered atleast 1 Motivation problem

       $RelationshipProblemAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having no close friends in school', 'Having no financial/emotional support', 'Having difficulty socializing'])->pluck('survey_response_answer_id');
       $RelationshipProblemResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $RelationshipProblemAnswers)->pluck('survey_response_id');
       $RelationshipProblemSurveyResponse = SurveyResponses::all()->whereIn('id', $RelationshipProblemResponseAnswers)->pluck('student_id');
       $RelationshipProblemStudents = Student::all()->whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
       $RelationshipProblemCCSStudents = $RelationshipProblemStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 relationship problem

       $StressAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having trouble sleeping', 'Having health problems', 'Always feeling tired'])->pluck('survey_response_answer_id');
       $StressSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StressAnswers)->pluck('survey_response_id');
       $StressSurveyResponse = SurveyResponses::all()->whereIn('id', $StressSurveyResponseAnswers)->pluck('student_id');
       $StressStudents = Student::all()->whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
       $StressCCSStudents = $StressStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Stress Management problem

       $StudentTeacherAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Getting along with teachers', 'Anxious to approach teachers'])->pluck('survey_response_answer_id');
       $StudentTeacherResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StudentTeacherAnswers)->pluck('survey_response_id');
       $StudentTeacherSurveyResponse = SurveyResponses::all()->whereIn('id', $StudentTeacherResponseAnswers)->pluck('student_id');
       $StudentTeacherStudents = Student::all()->whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
       $StudentTeacherCCSStudents = $StudentTeacherStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Student Teacher problem

       $SelfImageAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Struggling with sexual identity'])->pluck('survey_response_answer_id');
       $SelfImageResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $SelfImageAnswers)->pluck('survey_response_id');
       $SelfImageSurveyResponse = SurveyResponses::all()->whereIn('id', $SelfImageResponseAnswers)->pluck('student_id');
       $SelfImageStudents = Student::all()->whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
       $SelfImageCCSStudents = $SelfImageStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Self-Image problem

       $BullyingAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being bullied'])->pluck('survey_response_answer_id');
       $BullyingResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $BullyingAnswers)->pluck('survey_response_id');
       $BullyingSurveyResponse = SurveyResponses::all()->whereIn('id', $BullyingResponseAnswers)->pluck('student_id');
       $BulliedStudents = Student::all()->whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
       $BulliedCCSStudents = $BulliedStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Bullying  problem

       $PeerPressureAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being pressured by friends'])->pluck('survey_response_answer_id');
       $PeerPressureResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $PeerPressureAnswers)->pluck('survey_response_id');
       $PeerPressureSurveyResponse = SurveyResponses::all()->whereIn('id', $PeerPressureResponseAnswers)->pluck('student_id');
       $PeerPressuredStudents = Student::all()->whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
       $PeerPressuredCCSStudents = $PeerPressuredStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Peer-pressure  problem

       

        $CoeDepartments = Department::all()->where('college_id', '=', 1)->pluck('id');
       
        $CoeCourses = Course::all()->whereIn('department_id', $CoeDepartments)->pluck('id');

        $CoeStudents = Student::all()->whereIn('course_id', $CoeCourses)->pluck('firstname');

        
        
        $BSCAcount = Student::all()->whereIn('course_id', $BSCA)->count();
        $BSCScount = Student::all()->whereIn('course_id', $BSCS)->count();
        

        return view('viewsurveyresult')->with(['questioncategory' => $questioncategory, 'BSCAcount' => $BSCAcount, 'BSCScount' => $BSCScount, 'AnxiousCCSStudents' => $AnxiousCCSStudents, 'LackOfMotivationCCSStudents' => $LackOfMotivationCCSStudents, 'RelationshipProblemCCSStudents' => $RelationshipProblemCCSStudents, 'StressCCSStudents' => $StressCCSStudents, 'StudentTeacherCCSStudents' => $StudentTeacherCCSStudents, 'SelfImageCCSStudents' => $SelfImageCCSStudents, 'BulliedCCSStudents' => $BulliedCCSStudents, 'PeerPressuredCCSStudents' => $PeerPressuredCCSStudents]);
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
