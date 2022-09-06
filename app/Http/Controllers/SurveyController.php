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
       $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who answered atleast 1 Anxiety problem
       $AnxiousCCSStudentsCount = $AnxiousStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who answered atleast 1 Anxiety problem Count
       $AnxiousCAStudentsCount = $AnxiousCCSStudents->whereIn('course_id', 8)->count();
       $AnxiousISStudentsCount = $AnxiousCCSStudents->whereIn('course_id', 7)->count();
       $AnxiousComSciStudentsCount = $AnxiousCCSStudents->whereIn('course_id', 9)->count();
       $AnxiousITStudentsCount = $AnxiousCCSStudents->whereIn('course_id', 10)->count();

       $MotivationAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Lacking Motivation'])->pluck('survey_response_answer_id');
       $MotivationSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $MotivationAnswers)->pluck('survey_response_id');
       $MotivationSurveyResponse = SurveyResponses::all()->whereIn('id', $MotivationSurveyResponseAnswers)->pluck('student_id');
       $LackOfMotivationStudents = Student::all()->whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
       $LackOfMotivationCCSStudents = $LackOfMotivationStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who answered atleast 1 Motivation problem
       $LackOfMotivationCCSStudentsCount = $LackOfMotivationCCSStudents->count();
       $LackofMotivationCAStudentsCount = $LackOfMotivationCCSStudents->whereIn('course_id', 8)->count();
       $LackofMotivationISStudentsCount = $LackOfMotivationCCSStudents->whereIn('course_id', 7)->count();
       $LackofMotivationComSciStudentsCount = $LackOfMotivationCCSStudents->whereIn('course_id', 9)->count();
       $LackofMotivationITStudentsCount = $LackOfMotivationCCSStudents->whereIn('course_id', 10)->count();
       


       $RelationshipProblemAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having no close friends in school', 'Having no financial/emotional support', 'Having difficulty socializing'])->pluck('survey_response_answer_id');
       $RelationshipProblemResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $RelationshipProblemAnswers)->pluck('survey_response_id');
       $RelationshipProblemSurveyResponse = SurveyResponses::all()->whereIn('id', $RelationshipProblemResponseAnswers)->pluck('student_id');
       $RelationshipProblemStudents = Student::all()->whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
       $RelationshipProblemCCSStudents = $RelationshipProblemStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who are atleast having 1 relationship problem
       $RelationshipProblemCCSStudentsCount = $RelationshipProblemStudents->whereIn('course_id', $CCSCourses)->count();
       $RelationshipProblemISStudentsCount = $RelationshipProblemStudents->whereIn('course_id', 7)->count();
       $RelationshipProblemCAStudentsCount = $RelationshipProblemStudents->whereIn('course_id', 8)->count();
       $RelationshipProblemComSciStudentsCount = $RelationshipProblemStudents->whereIn('course_id', 9)->count();
       $RelationshipProblemITStudentsCount = $RelationshipProblemStudents->whereIn('course_id', 10)->count();



       $StressAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having trouble sleeping', 'Having health problems', 'Always feeling tired'])->pluck('survey_response_answer_id');
       $StressSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StressAnswers)->pluck('survey_response_id');
       $StressSurveyResponse = SurveyResponses::all()->whereIn('id', $StressSurveyResponseAnswers)->pluck('student_id');
       $StressStudents = Student::all()->whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
       $StressCCSStudents = $StressStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who are atleast having 1 Stress Management problem
       $StressCCSStudentsCount = $StressStudents->whereIn('course_id', $CCSCourses)->count();
       $StressProblemISStudentsCount = $StressCCSStudents->whereIn('course_id', 7)->count();
       $StressProblemCAStudentsCount = $StressCCSStudents->whereIn('course_id', 8)->count();
       $StressProblemComSciStudentsCount = $StressCCSStudents->whereIn('course_id', 9)->count();
       $StressProblemITStudentsCount = $StressCCSStudents->whereIn('course_id', 10)->count();



       $StudentTeacherAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Getting along with teachers', 'Anxious to approach teachers'])->pluck('survey_response_answer_id');
       $StudentTeacherResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StudentTeacherAnswers)->pluck('survey_response_id');
       $StudentTeacherSurveyResponse = SurveyResponses::all()->whereIn('id', $StudentTeacherResponseAnswers)->pluck('student_id');
       $StudentTeacherStudents = Student::all()->whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
       $StudentTeacherCCSStudents = $StudentTeacherStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who are atleast having 1 Student Teacher problem
       $StudentTeacherCCSStudentsCount = $StudentTeacherCCSStudents->whereIn('course_id', $CCSCourses)->count();
       $StudentTeacherISStudentsCount = $StudentTeacherCCSStudents->whereIn('course_id', 7)->count();
       $StudentTeacherCAStudentsCount = $StudentTeacherCCSStudents->whereIn('course_id', 8)->count();
       $StudentTeacherITStudentsCount = $StudentTeacherCCSStudents->whereIn('course_id', 10)->count();
       $StudentTeacherComSciStudentsCount = $StudentTeacherCCSStudents->whereIn('course_id', 9)->count();
       

       $SelfImageAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Struggling with sexual identity'])->pluck('survey_response_answer_id');
       $SelfImageResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $SelfImageAnswers)->pluck('survey_response_id');
       $SelfImageSurveyResponse = SurveyResponses::all()->whereIn('id', $SelfImageResponseAnswers)->pluck('student_id');
       $SelfImageStudents = Student::all()->whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
       $SelfImageCCSStudents = $SelfImageStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who are atleast having 1 Self-Image problem
       $SelfImageCCSStudentsCount = $SelfImageStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Self-Image problem
       $SelfImageISStudentsCount = $SelfImageCCSStudents->whereIn('course_id', 7)->count();
       $SelfImageCAStudentsCount = $SelfImageCCSStudents->whereIn('course_id', 8)->count();
       $SelfImageComSciStudentsCount = $SelfImageCCSStudents->whereIn('course_id', 9)->count();
       $SelfImageITStudentsCount = $SelfImageCCSStudents->whereIn('course_id', 10)->count();



       $BullyingAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being bullied'])->pluck('survey_response_answer_id');
       $BullyingResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $BullyingAnswers)->pluck('survey_response_id');
       $BullyingSurveyResponse = SurveyResponses::all()->whereIn('id', $BullyingResponseAnswers)->pluck('student_id');
       $BulliedStudents = Student::all()->whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
       $BulliedCCSStudents = $BulliedStudents->whereIn('course_id', $CCSCourses);
       $BulliedCCSStudentsCount = $BulliedStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Bullying  problem
       $BulliedISStudentsCount = $BulliedCCSStudents->whereIn('course_id', 7)->count();
       $BulliedCAStudentsCount = $BulliedCCSStudents->whereIn('course_id', 8)->count();
       $BulliedComSciStudentsCount = $BulliedCCSStudents->whereIn('course_id', 9)->count();
       $BulliedITStudentsCount = $BulliedCCSStudents->whereIn('course_id', 10)->count();



       $PeerPressureAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being pressured by friends'])->pluck('survey_response_answer_id');
       $PeerPressureResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $PeerPressureAnswers)->pluck('survey_response_id');
       $PeerPressureSurveyResponse = SurveyResponses::all()->whereIn('id', $PeerPressureResponseAnswers)->pluck('student_id');
       $PeerPressuredStudents = Student::all()->whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
       $PeerPressuredCCSStudents = $PeerPressuredStudents->whereIn('course_id', $CCSCourses);
       $PeerPressuredCCSStudentsCount = $PeerPressuredStudents->whereIn('course_id', $CCSCourses)->count(); //Query for all Students from CCS who are atleast having 1 Peer-pressure  problem
       $PeerPressuredISStudentsCount = $PeerPressuredCCSStudents->whereIn('course_id', 7)->count();
       $PeerPressuredCAStudentsCount = $PeerPressuredCCSStudents->whereIn('course_id', 8)->count();
       $PeerPressuredComSciStudentsCount = $PeerPressuredCCSStudents->whereIn('course_id', 9)->count();
       $PeerPressuredITStudentsCount = $PeerPressuredCCSStudents->whereIn('course_id', 10)->count();

      

        $CoeDepartments = Department::all()->where('college_id', '=', 1)->pluck('id');
       
        $CoeCourses = Course::all()->whereIn('department_id', $CoeDepartments)->pluck('id');

        $CoeStudents = Student::all()->whereIn('course_id', $CoeCourses)->pluck('firstname');

       
        
        $BSCAcount = Student::all()->whereIn('course_id', $BSCA)->count();
        $BSCScount = Student::all()->whereIn('course_id', $BSCS)->count();
        

        return view('viewsurveyresult')->with(['questioncategory' => $questioncategory, 'BSCAcount' => $BSCAcount, 'BSCScount' => $BSCScount, 'AnxiousCCSStudentsCount' => $AnxiousCCSStudentsCount, 'LackOfMotivationCCSStudents' => $LackOfMotivationCCSStudents, 'RelationshipProblemCCSStudents' => $RelationshipProblemCCSStudents, 'StressCCSStudents' => $StressCCSStudents, 'StudentTeacherCCSStudents' => $StudentTeacherCCSStudents, 'SelfImageCCSStudents' => $SelfImageCCSStudents, 
        'BulliedCCSStudents' => $BulliedCCSStudents, 'PeerPressuredCCSStudents' => $PeerPressuredCCSStudents, 
        'AnxiousCAStudentsCount' => $AnxiousCAStudentsCount, 'AnxiousISStudentsCount' => $AnxiousISStudentsCount,
        'AnxiousComSciStudentsCount' => $AnxiousComSciStudentsCount, 'AnxiousITStudentsCount' => $AnxiousITStudentsCount,
        'LackofMotivationCAStudentsCount' => $LackofMotivationCAStudentsCount,'LackofMotivationISStudentsCount' => $LackofMotivationISStudentsCount,
        'LackofMotivationComSciStudentsCount' => $LackofMotivationComSciStudentsCount, 'LackofMotivationITStudentsCount' =>$LackofMotivationITStudentsCount, 'LackOfMotivationCCSStudentsCount' => $LackOfMotivationCCSStudentsCount,
        'RelationshipProblemCCSStudentsCount' => $RelationshipProblemCCSStudentsCount, 'RelationshipProblemISStudentsCount' => $RelationshipProblemISStudentsCount, 'RelationshipProblemCAStudentsCount' => $RelationshipProblemCAStudentsCount,
        'RelationshipProblemComSciStudentsCount' => $RelationshipProblemComSciStudentsCount, 'RelationshipProblemITStudentsCount' => $RelationshipProblemITStudentsCount,
        'StressProblemISStudentsCount' => $StressProblemISStudentsCount, 'StressProblemCAStudentsCount' => $StressProblemCAStudentsCount, 'StressProblemComSciStudentsCount' => $StressProblemComSciStudentsCount,
        'StressProblemITStudentsCount' => $StressProblemITStudentsCount, 'StressCCSStudentsCount' => $StressCCSStudentsCount,
        'StudentTeacherCCSStudentsCount' => $StudentTeacherCCSStudentsCount, 'StudentTeacherISStudentsCount' => $StudentTeacherISStudentsCount, 'StudentTeacherComSciStudentsCount' => $StudentTeacherComSciStudentsCount,
        'StudentTeacherITStudentsCount' => $StudentTeacherITStudentsCount, 'StudentTeacherCAStudentsCount' => $StudentTeacherCAStudentsCount, 'SelfImageCCSStudentsCount' => $SelfImageCCSStudentsCount,
        'SelfImageISStudentsCount' => $SelfImageISStudentsCount, 'SelfImageCAStudentsCount' => $SelfImageCAStudentsCount, 'SelfImageComSciStudentsCount' => $SelfImageComSciStudentsCount,
        'SelfImageITStudentsCount' => $SelfImageITStudentsCount, 'BulliedCCSStudentsCount' => $BulliedCCSStudentsCount, 
        'BulliedISStudentsCount' => $BulliedISStudentsCount, 'BulliedCAStudentsCount' => $BulliedCAStudentsCount, 'BulliedComSciStudentsCount' => $BulliedComSciStudentsCount,
        'BulliedITStudentsCount' => $BulliedITStudentsCount, 'PeerPressuredCCSStudentsCount' => $PeerPressuredCCSStudentsCount, 'PeerPressuredISStudentsCount' => $PeerPressuredISStudentsCount,
        'PeerPressuredCAStudentsCount' => $PeerPressuredCAStudentsCount, 'PeerPressuredComSciStudentsCount' => $PeerPressuredComSciStudentsCount, 'PeerPressuredITStudentsCount' => $PeerPressuredITStudentsCount]);
    
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
