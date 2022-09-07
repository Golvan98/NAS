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

    public function studentlist($questioncategory)
    {
        /*query for all Departments in CCS */$CCSDepartments = Department::all()->whereIn('departmentname', ['Computer Application', 'Computer Science', 'Information Technology', 'Information Systems'])->pluck('id');
        /*query for all Courses in CCS */$CCSCourses = Course::all()->whereIn('department_id', $CCSDepartments)->pluck('id');


        $AnxietyAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Afraid I might not fit in MSU-IIT', 'Afraid to speak up in class', 'Afraid of failing in subjects', 'Anxious to approach teachers', 'Panicking during tests' ])->pluck('survey_response_answer_id');
        $AnxietySurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $AnxietyAnswers)->pluck('survey_response_id');
        $AnxietySurveyResponse = SurveyResponses::all()->whereIn('id', $AnxietySurveyResponseAnswers)->pluck('student_id');
        $AnxiousStudents = Student::all()->whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
        $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses); //Query for all Students from CCS who answered atleast 1 Anxiety problem
      
        
        $CCSCoursesIDs = Course::all()->whereIn('coursecode', ['BSIS', 'BSCA', 'BSCS', 'BSIT'])->pluck('id');

        $students = Student::whereIn('course_id', $CCSCoursesIDs )->simplePaginate(11);
        return view('studentlist')->with(['students' => $students, 'questioncategory' => $questioncategory, 'AnxiousCCSStudents' => $AnxiousCCSStudents]);
       
    }
}
