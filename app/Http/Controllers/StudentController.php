<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use illuminate\Contracts\Auth\user as Authenticatable;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\SurveyResponseAnswers;
use App\Models\SurveyResponses;
use App\Models\Department;
use App\Models\AnswerChoice;
use Illuminate\Pagination\Paginator;


class StudentController extends Controller
{

    public function testlogin()
    {
        return view('login');
    }

    public function sessionlogin()
    {
        $data = request()->validate([
            'firstname' => 'required',
            'password' => 'required',
        ]);
        
        if (auth()->attempt($data)) {
            
            return redirect('/home')->with('success', 'You are now logged in');
                                          }
        else 
        {
            return redirect()->back()->with('error', 'Failed to log in');                             
        }
    }

    public function testlogout()
    {
        auth()->logout();
        return redirect('home')->with('success', 'Logged Out Successfully');
    }

    public function studentdepartmentcategory($course, $questioncategory)
    {

        
    }

    public function studentlist($course, $questioncategory)
    {
        /*query for all Departments in CCS */$CCSDepartments = Department::all()->whereIn('departmentname', ['Computer Application', 'Computer Science', 'Information Technology', 'Information Systems'])->pluck('id');
        /*query for all Courses in CCS */$CCSCourses = Course::all()->whereIn('department_id', $CCSDepartments)->pluck('id');


        $AnxietyAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Afraid I might not fit in MSU-IIT', 'Afraid to speak up in class', 'Afraid of failing in subjects', 'Anxious to approach teachers', 'Panicking during tests' ])->pluck('survey_response_answer_id');
        $AnxietySurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $AnxietyAnswers)->pluck('survey_response_id');
        $AnxietySurveyResponse = SurveyResponses::all()->whereIn('id', $AnxietySurveyResponseAnswers)->pluck('student_id');
        $AnxiousStudents = Student::all()->whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
        $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who answered atleast 1 Anxiety problem
      
        $MotivationAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Lacking Motivation'])->pluck('survey_response_answer_id');
        $MotivationSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $MotivationAnswers)->pluck('survey_response_id');
        $MotivationSurveyResponse = SurveyResponses::all()->whereIn('id', $MotivationSurveyResponseAnswers)->pluck('student_id');
        $LackOfMotivationStudents = Student::all()->whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
        $LackOfMotivationCCSStudents = $LackOfMotivationStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who answered atleast 1 Motivation problem
    
        $RelationshipProblemAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having no close friends in school', 'Having no financial/emotional support', 'Having difficulty socializing'])->pluck('survey_response_answer_id');
        $RelationshipProblemResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $RelationshipProblemAnswers)->pluck('survey_response_id');
        $RelationshipProblemSurveyResponse = SurveyResponses::all()->whereIn('id', $RelationshipProblemResponseAnswers)->pluck('student_id');
        $RelationshipProblemStudents = Student::all()->whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
        $RelationshipProblemCCSStudents = $RelationshipProblemStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who are atleast having 1 relationship problem
       
        $StressAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having trouble sleeping', 'Having health problems', 'Always feeling tired'])->pluck('survey_response_answer_id');
        $StressSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StressAnswers)->pluck('survey_response_id');
        $StressSurveyResponse = SurveyResponses::all()->whereIn('id', $StressSurveyResponseAnswers)->pluck('student_id');
        $StressStudents = Student::all()->whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
        $StressCCSStudents = $StressStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who are atleast having 1 Stress Management problem
      
        $StudentTeacherAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Getting along with teachers', 'Anxious to approach teachers'])->pluck('survey_response_answer_id');
        $StudentTeacherResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StudentTeacherAnswers)->pluck('survey_response_id');
        $StudentTeacherSurveyResponse = SurveyResponses::all()->whereIn('id', $StudentTeacherResponseAnswers)->pluck('student_id');
        $StudentTeacherStudents = Student::all()->whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
        $StudentTeacherCCSStudents = $StudentTeacherStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Student Teacher problem
      
        $SelfImageAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Struggling with sexual identity'])->pluck('survey_response_answer_id');
        $SelfImageResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $SelfImageAnswers)->pluck('survey_response_id');
        $SelfImageSurveyResponse = SurveyResponses::all()->whereIn('id', $SelfImageResponseAnswers)->pluck('student_id');
        $SelfImageStudents = Student::all()->whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
        $SelfImageCCSStudents = $SelfImageStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who are atleast having 1 Self-Image problem
      
        $BullyingAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being bullied'])->pluck('survey_response_answer_id');
        $BullyingResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $BullyingAnswers)->pluck('survey_response_id');
        $BullyingSurveyResponse = SurveyResponses::all()->whereIn('id', $BullyingResponseAnswers)->pluck('student_id');
        $BulliedStudents = Student::all()->whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
        $BulliedCCSStudents = $BulliedStudents->whereIn('course_id', $CCSCourses);
       
        $PeerPressureAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being pressured by friends'])->pluck('survey_response_answer_id');
        $PeerPressureResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $PeerPressureAnswers)->pluck('survey_response_id');
        $PeerPressureSurveyResponse = SurveyResponses::all()->whereIn('id', $PeerPressureResponseAnswers)->pluck('student_id');
        $PeerPressuredStudents = Student::all()->whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
        $PeerPressuredCCSStudents = $PeerPressuredStudents->whereIn('course_id', $CCSCourses);
        
        
        $CCSCoursesIDs = Course::all()->whereIn('coursecode', ['BSIS', 'BSCA', 'BSCS', 'BSIT'])->pluck('id');

        $CCScourse = Course::where('id', $course)->get();

        
        $students = Student::whereIn('course_id', $CCSCoursesIDs )->simplePaginate(11);
        return view('studentlist')->with(['students' => $students, 'questioncategory' => $questioncategory, 'AnxiousCCSStudents' => $AnxiousCCSStudents, 'LackOfMotivationCCSStudents' => $LackOfMotivationCCSStudents,
        'RelationshipProblemCCSStudents' => $RelationshipProblemCCSStudents, 'StressCCSStudents' => $StressCCSStudents,
        'StudentTeacherCCSStudents' => $StudentTeacherCCSStudents, 'SelfImageCCSStudents' => $SelfImageCCSStudents,
        'BulliedCCSStudents' => $BulliedCCSStudents, 'PeerPressuredCCSStudents' => $PeerPressuredCCSStudents, 'CCScourse' => $CCScourse]);
       
    }
}
