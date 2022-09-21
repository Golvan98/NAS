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
use App\Models\College;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



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

    public function piechart($questioncategory)
    {

          
        

        $CCSDepartments = Department::all()->whereIn('departmentname', ['Computer Application', 'Computer Science', 'Information Technology', 'Information Systems'])->pluck('id'); /*query for all Departments in CCS */
        $CCSCourses = Course::all()->whereIn('department_id', $CCSDepartments)->pluck('id'); /*query for all Courses in CCS */
        $questioncategories = SurveyQuestion::where('survey_id', 1)->pluck('category')->unique();
        $CCSStudents = Student::whereIn('course_id', $CCSCourses)->paginate(10);
        $CCSStudents1 = Student::all()->whereIn('course_id', $CCSCourses);

        $CCSStudentsid = Student::whereIn('course_id', $CCSCourses)->pluck('id');
     
      $StudentsWhoAnsweredNASid = SurveyResponses::whereIn('student_id', $CCSStudentsid)->where('survey_id', 1)->pluck('student_id')->unique();
      //  $CCSStudentsWhoAnswered = Student::where('id', $StudentsWhoAnswered);
      $StudentsWhoAnsweredNAS = student::all()->whereIn('id', $StudentsWhoAnsweredNASid);

      $UnresponsiveStudentsid = $CCSStudents1->diff($StudentsWhoAnsweredNAS)->pluck('id');

      $ResponsiveStudents = Student::whereIn('id', $StudentsWhoAnsweredNASid)->paginate(5);
      $UnresponsiveStudents = Student::whereIn('id', $UnresponsiveStudentsid)->paginate(5);
     
      $AnxietyAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Afraid I might not fit in MSU-IIT', 'Afraid to speak up in class', 'Afraid of failing in subjects', 'Anxious to approach teachers', 'Panicking during tests' ])->pluck('survey_response_answer_id');
      $AnxietySurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $AnxietyAnswers)->pluck('survey_response_id');
      $AnxietySurveyResponse = SurveyResponses::all()->whereIn('id', $AnxietySurveyResponseAnswers)->pluck('student_id');
      $AnxiousStudents = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
      $AnxiousStudents2 = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem     
      $AnxiousStudents3 = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem      
      $AnxiousStudents4 = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
      $AnxiousStudents5 = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
      $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses)->get();
      $AnxiousISStudents = count($AnxiousStudents2->whereIn('course_id', [7])->get());
      $AnxiousCAStudents = count($AnxiousStudents3->whereIn('course_id', [8])->get());
      $AnxiousComSciStudents = count($AnxiousStudents4->whereIn('course_id', [9])->get());
      $AnxiousITStudents = count($AnxiousStudents5->whereIn('course_id', [10])->get());
      
      
      
      $MotivationAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Lacking Motivation'])->pluck('survey_response_answer_id');
      $MotivationSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $MotivationAnswers)->pluck('survey_response_id');
      $MotivationSurveyResponse = SurveyResponses::all()->whereIn('id', $MotivationSurveyResponseAnswers)->pluck('student_id');
      $LackOfMotivationStudents = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
      $LackOfMotivationStudents2 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
      $LackOfMotivationStudents3 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
      $LackOfMotivationStudents4 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
      $LackOfMotivationStudents5 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
      $LackOfMotivationCCSStudents = $LackOfMotivationStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who answered atleast 1 Motivation problem
      $LackOfMotivationISStudents = count($LackOfMotivationStudents2->whereIn('course_id', [7])->get());
      $LackOfMotivationCAStudents = count($LackOfMotivationStudents3->whereIn('course_id', [8])->get());
      $LackOfMotivationITStudents = count($LackOfMotivationStudents4->whereIn('course_id', [9])->get());
      $LackOfMotivationComSciStudents = count($LackOfMotivationStudents5->whereIn('course_id', [10])->get());


      $RelationshipProblemAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having no close friends in school', 'Having no financial/emotional support', 'Having difficulty socializing'])->pluck('survey_response_answer_id');
      $RelationshipProblemResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $RelationshipProblemAnswers)->pluck('survey_response_id');
      $RelationshipProblemSurveyResponse = SurveyResponses::all()->whereIn('id', $RelationshipProblemResponseAnswers)->pluck('student_id');
      $RelationshipProblemStudents = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
      $RelationshipProblemStudents2 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
      $RelationshipProblemStudents3 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
      $RelationshipProblemStudents4 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
      $RelationshipProblemStudents5 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
      $RelationshipProblemCCSStudents = $RelationshipProblemStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 relationship problem
      $RelationshipProblemISStudents = count($RelationshipProblemStudents2->whereIn('course_id', [7])->get());
      $RelationshipProblemCAStudents = count($RelationshipProblemStudents3->whereIn('course_id', [8])->get());
      $RelationshipProblemComSciStudents = count($RelationshipProblemStudents4->whereIn('course_id', [9])->get());
      $RelationshipProblemITStudents = count($RelationshipProblemStudents5->whereIn('course_id', [10])->get());
     

      $StressAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having trouble sleeping', 'Having health problems', 'Always feeling tired'])->pluck('survey_response_answer_id');
      $StressSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StressAnswers)->pluck('survey_response_id');
      $StressSurveyResponse = SurveyResponses::all()->whereIn('id', $StressSurveyResponseAnswers)->pluck('student_id');
      $StressStudents = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
      $StressStudents2 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
      $StressStudents3 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
      $StressStudents4 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
      $StressStudents5 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
      $StressCCSStudents = $StressStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Stress Management problem
      $StressedISStudents = count($StressStudents2->whereIn('course_id', [7])->get());
      $StressedCAStudents = count($StressStudents3->whereIn('course_id', [8])->get());
      $StressedComSciStudents = count($StressStudents4->whereIn('course_id', [9])->get());
      $StressedITStudents = count($StressStudents5->whereIn('course_id', [10])->get());




      $StudentTeacherAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Getting along with teachers', 'Anxious to approach teachers'])->pluck('survey_response_answer_id');
      $StudentTeacherResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StudentTeacherAnswers)->pluck('survey_response_id');
      $StudentTeacherSurveyResponse = SurveyResponses::all()->whereIn('id', $StudentTeacherResponseAnswers)->pluck('student_id');
      $StudentTeacherStudents = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
      $StudentTeacherStudent2 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
      $StudentTeacherStudent3 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
      $StudentTeacherStudent4 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
      $StudentTeacherStudent5 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem



      $StudentTeacherCCSStudents = $StudentTeacherStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Student Teacher problem
      
      $SelfImageAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Struggling with sexual identity'])->pluck('survey_response_answer_id');
      $SelfImageResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $SelfImageAnswers)->pluck('survey_response_id');
      $SelfImageSurveyResponse = SurveyResponses::all()->whereIn('id', $SelfImageResponseAnswers)->pluck('student_id');
      $SelfImageStudents = Student::whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
      $SelfImageCCSStudents = $SelfImageStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Self-Image problem
    
      $BullyingAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being bullied'])->pluck('survey_response_answer_id');
      $BullyingResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $BullyingAnswers)->pluck('survey_response_id');
      $BullyingSurveyResponse = SurveyResponses::all()->whereIn('id', $BullyingResponseAnswers)->pluck('student_id');
      $BulliedStudents = Student::whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
      $BulliedCCSStudents = $BulliedStudents->whereIn('course_id', $CCSCourses)->paginate(10);
     
      $PeerPressureAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being pressured by friends'])->pluck('survey_response_answer_id');
      $PeerPressureResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $PeerPressureAnswers)->pluck('survey_response_id');
      $PeerPressureSurveyResponse = SurveyResponses::all()->whereIn('id', $PeerPressureResponseAnswers)->pluck('student_id');
      $PeerPressuredStudents = Student::whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
      $PeerPressuredCCSStudents = $PeerPressuredStudents->whereIn('course_id', $CCSCourses)->paginate(10);


      
      $NoMotivationCCS_count = count($LackOfMotivationCCSStudents);
      $RelationshipProblemCCS_count = count($RelationshipProblemCCSStudents);

      $RelationshipProblemISStudents = count($RelationshipProblemStudents2->whereIn('course_id', [7])->get());
      $RelationshipProblemCAStudents = count($RelationshipProblemStudents3->whereIn('course_id', [8])->get());
      $RelationshipProblemComSciStudents = count($RelationshipProblemStudents4->whereIn('course_id', [9])->get());
      $RelationshipProblemITStudents = count($RelationshipProblemStudents5->whereIn('course_id', [10])->get());
     
        return view('dynamicpiechart', compact('questioncategory','AnxiousISStudents','AnxiousCAStudents', 'AnxiousComSciStudents', 'AnxiousITStudents','LackOfMotivationISStudents', 'LackOfMotivationCAStudents', 'LackOfMotivationITStudents', 'LackOfMotivationComSciStudents',
                    'RelationshipProblemISStudents', 'RelationshipProblemCAStudents', 'RelationshipProblemComSciStudents', 'RelationshipProblemITStudents', 'StressedISStudents' , 'StressedCAStudents', 'StressedComSciStudents' ,'StressedITStudents'));
    }

    public function studentanswerlist($student)
    {

        $StudentNASResponse = SurveyResponses::where('student_id', $student)->where('survey_id', 1)->pluck('id');
        $NASSurveyQuestions = SurveyQuestion::whereIn('survey_id', [1])->paginate(9);
        $NASSurveyQuestionsid = SurveyQuestion::all()->whereIn('survey_id', 1)->pluck('id');
        $StudentNASAnswersid = SurveyResponseAnswers::all()->whereIn('survey_response_id', $StudentNASResponse)->whereIn('survey_question_id', $NASSurveyQuestionsid)->pluck('id');
       // $StudentAnswerChoicesResponse = AnswerChoice::all()->whereIn('survey_response_answer_id' , $StudentNASResponse);
        $StudentAnswerChoicesResponseid = AnswerChoice::all()->whereIn('survey_response_answer_id' , $StudentNASResponse)->pluck('survey_response_answer_id');
      

        $SelectedStudentid = Student::where('id', $student)->pluck('id');
        $StudentNASResponses = SurveyResponses::whereIn('student_id' , $SelectedStudentid)->whereIn('survey_id', [1])->pluck('id');
        /* ^ testvar is a NAS Response by selected student */ 
 
    $StudentNASAnswers = SurveyResponseAnswers::whereIn('survey_response_id', $StudentNASResponses)->get();
    $StudentAnswerChoices = AnswerChoice::whereIn('survey_response_answer_id' , $StudentNASAnswersid)->get();
   

    //$StudentNASAnswersid1 = SurveyResponseAnswers::all()->whereIn('survey_response_id', $StudentNASResponses)->pluck('id');
      //  $StudentNASAnswersid2 = SurveyResponseAnswers::all()->whereIn('survey_response_id', $StudentNASResponses)->pluck('survey_question_id');
        
        
       
        $SelectedStudent = Student::where('id', $student)->get();

        /* foreach($NASSurveyQuestions as $NASSurveyQuestion)
        {
            $QuestionAnswerChoice = AnswerChoice::all()->whereIn('survey_response_answer_id', $StudentNASAnswersid);
        }

       dd($QuestionAnswerChoice); */
        
        return view('studentanswerlist')->with(['SelectedStudent' => $SelectedStudent, 'StudentAnswerChoices' => $StudentAnswerChoices, 'NASSurveyQuestions' => $NASSurveyQuestions, 'StudentNASResponse' => $StudentNASResponse, 'StudentNASAnswers' =>$StudentNASAnswers]);
    }

    public function collegestudentlist($college, $questioncategory)
    {
           /*query for all Departments in CCS */$CCSDepartments = Department::all()->whereIn('departmentname', ['Computer Application', 'Computer Science', 'Information Technology', 'Information Systems'])->pluck('id');
        /*query for all Courses in CCS */$CCSCourses = Course::all()->whereIn('department_id', $CCSDepartments)->pluck('id');
        $questioncategories = SurveyQuestion::where('survey_id', 1)->pluck('category')->unique();
        $CCSStudents = Student::whereIn('course_id', $CCSCourses)->paginate(10);
        $CCSStudents1 = Student::all()->whereIn('course_id', $CCSCourses);

        $CCSStudentsid = Student::whereIn('course_id', $CCSCourses)->pluck('id');
        
        
        $StudentsWhoAnsweredNASid = SurveyResponses::whereIn('student_id', $CCSStudentsid)->where('survey_id', 1)->pluck('student_id')->unique();
      //  $CCSStudentsWhoAnswered = Student::where('id', $StudentsWhoAnswered);
      $StudentsWhoAnsweredNAS = student::all()->whereIn('id', $StudentsWhoAnsweredNASid);

      $UnresponsiveStudentsid = $CCSStudents1->diff($StudentsWhoAnsweredNAS)->pluck('id');

      $ResponsiveStudents = Student::whereIn('id', $StudentsWhoAnsweredNASid)->paginate(5);
      $UnresponsiveStudents = Student::whereIn('id', $UnresponsiveStudentsid)->paginate(5);
     
        $AnxietyAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Afraid I might not fit in MSU-IIT', 'Afraid to speak up in class', 'Afraid of failing in subjects', 'Anxious to approach teachers', 'Panicking during tests' ])->pluck('survey_response_answer_id');
        $AnxietySurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $AnxietyAnswers)->pluck('survey_response_id');
        $AnxietySurveyResponse = SurveyResponses::all()->whereIn('id', $AnxietySurveyResponseAnswers)->pluck('student_id');
        $AnxiousStudents = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
        $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who answered atleast 1 Anxiety problem
        
        $MotivationAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Lacking Motivation'])->pluck('survey_response_answer_id');
        $MotivationSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $MotivationAnswers)->pluck('survey_response_id');
        $MotivationSurveyResponse = SurveyResponses::all()->whereIn('id', $MotivationSurveyResponseAnswers)->pluck('student_id');
        $LackOfMotivationStudents = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
        $LackOfMotivationCCSStudents = $LackOfMotivationStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who answered atleast 1 Motivation problem
    
        $RelationshipProblemAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having no close friends in school', 'Having no financial/emotional support', 'Having difficulty socializing'])->pluck('survey_response_answer_id');
        $RelationshipProblemResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $RelationshipProblemAnswers)->pluck('survey_response_id');
        $RelationshipProblemSurveyResponse = SurveyResponses::all()->whereIn('id', $RelationshipProblemResponseAnswers)->pluck('student_id');
        $RelationshipProblemStudents = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
        $RelationshipProblemCCSStudents = $RelationshipProblemStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 relationship problem
       
        $StressAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having trouble sleeping', 'Having health problems', 'Always feeling tired'])->pluck('survey_response_answer_id');
        $StressSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StressAnswers)->pluck('survey_response_id');
        $StressSurveyResponse = SurveyResponses::all()->whereIn('id', $StressSurveyResponseAnswers)->pluck('student_id');
        $StressStudents = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
        $StressCCSStudents = $StressStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Stress Management problem
      
        $StudentTeacherAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Getting along with teachers', 'Anxious to approach teachers'])->pluck('survey_response_answer_id');
        $StudentTeacherResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StudentTeacherAnswers)->pluck('survey_response_id');
        $StudentTeacherSurveyResponse = SurveyResponses::all()->whereIn('id', $StudentTeacherResponseAnswers)->pluck('student_id');
        $StudentTeacherStudents = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
        $StudentTeacherCCSStudents = $StudentTeacherStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Student Teacher problem
        
        $SelfImageAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Struggling with sexual identity'])->pluck('survey_response_answer_id');
        $SelfImageResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $SelfImageAnswers)->pluck('survey_response_id');
        $SelfImageSurveyResponse = SurveyResponses::all()->whereIn('id', $SelfImageResponseAnswers)->pluck('student_id');
        $SelfImageStudents = Student::whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
        $SelfImageCCSStudents = $SelfImageStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Self-Image problem
      
        $BullyingAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being bullied'])->pluck('survey_response_answer_id');
        $BullyingResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $BullyingAnswers)->pluck('survey_response_id');
        $BullyingSurveyResponse = SurveyResponses::all()->whereIn('id', $BullyingResponseAnswers)->pluck('student_id');
        $BulliedStudents = Student::whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
        $BulliedCCSStudents = $BulliedStudents->whereIn('course_id', $CCSCourses)->paginate(10);
       
        $PeerPressureAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being pressured by friends'])->pluck('survey_response_answer_id');
        $PeerPressureResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $PeerPressureAnswers)->pluck('survey_response_id');
        $PeerPressureSurveyResponse = SurveyResponses::all()->whereIn('id', $PeerPressureResponseAnswers)->pluck('student_id');
        $PeerPressuredStudents = Student::whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
        $PeerPressuredCCSStudents = $PeerPressuredStudents->whereIn('course_id', $CCSCourses)->paginate(10);




       
        return view('collegestudentlist')->with(['college' => $college, 'questioncategory' => $questioncategory, 'AnxiousCCSStudents' => $AnxiousCCSStudents, 'LackOfMotivationCCSStudents' => $LackOfMotivationCCSStudents,
        'RelationshipProblemCCSStudents' => $RelationshipProblemCCSStudents, 'StressCCSStudents' => $StressCCSStudents,
        'StudentTeacherCCSStudents' => $StudentTeacherCCSStudents, 'SelfImageCCSStudents' => $SelfImageCCSStudents,
        'BulliedCCSStudents' => $BulliedCCSStudents, 'PeerPressuredCCSStudents' => $PeerPressuredCCSStudents, 'questioncategories' => $questioncategories, 'CCSStudents' => $CCSStudents,
        'UnresponsiveStudents' => $UnresponsiveStudents, 'ResponsiveStudents' => $ResponsiveStudents]);
    }

    public function studentlist($course, $questioncategory)
    {
        /*query for all Departments in CCS */$CCSDepartments = Department::all()->whereIn('departmentname', ['Computer Application', 'Computer Science', 'Information Technology', 'Information Systems'])->pluck('id');
        /*query for all Courses in CCS */$CCSCourses = Course::all()->whereIn('department_id', $CCSDepartments)->pluck('id');
        $BSISCourse = Course::all()->whereIn('coursecode', "BSIS")->pluck('id');
        $BSITCourse = Course::where('coursecode', "BSIT")->pluck('id');
        $BSComSciCourse = Course::all()->whereIn('coursecode', "BSCS")->pluck('id');
        $BSCACourse = Course::where('coursecode', "BSCA")->pluck('id');
        

        

        $AnxietyAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Afraid I might not fit in MSU-IIT', 'Afraid to speak up in class', 'Afraid of failing in subjects', 'Anxious to approach teachers', 'Panicking during tests' ])->pluck('survey_response_answer_id');
        $AnxietySurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $AnxietyAnswers)->pluck('survey_response_id');
        $AnxietySurveyResponse = SurveyResponses::all()->whereIn('id', $AnxietySurveyResponseAnswers)->pluck('student_id');
        $AnxiousStudents = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
        $AnxiousStudents2 = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
        $AnxiousStudents3 = Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
        $AnxiousStudents4= Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
        $AnxiousStudents5= Student::whereIn('id', $AnxietySurveyResponse); //Query for all Students who answered atleast 1 Anxiety problem
       /* */  $AnxiousCCSStudents = $AnxiousStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who answered atleast 1 Anxiety problem
        $AnxiousISStudents = $AnxiousStudents2->whereIn('course_id', [7])->paginate(10);
        $AnxiousCAStudents = $AnxiousStudents3->whereIn('course_id', [8])->paginate(10);
        $AnxiousComSciStudents = $AnxiousStudents4->whereIn('course_id', [9])->paginate(10);
        $AnxiousITStudents = $AnxiousStudents5->whereIn('course_id', [10])->paginate(10);


        $MotivationAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Lacking Motivation'])->pluck('survey_response_answer_id');
        $MotivationSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $MotivationAnswers)->pluck('survey_response_id');
        $MotivationSurveyResponse = SurveyResponses::all()->whereIn('id', $MotivationSurveyResponseAnswers)->pluck('student_id');
        $LackOfMotivationStudents = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
        $LackOfMotivationStudents2 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
        $LackOfMotivationStudents3 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
        $LackOfMotivationStudents4 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
        $LackOfMotivationStudents5 = Student::whereIn('id', $MotivationSurveyResponse); //Query for all Students who answered atleast 1 Motivation problem
    /* */   $LackOfMotivationCCSStudents = $LackOfMotivationStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who answered atleast 1 Motivation problem
        $LackOfMotivationISStudents = $LackOfMotivationStudents2->whereIn('course_id', [7])->paginate(10);
        $LackOfMotivationCAStudents = $LackOfMotivationStudents3->whereIn('course_id', [8])->paginate(10);
        $LackOfMotivationComSciStudents = $LackOfMotivationStudents4->whereIn('course_id', [9])->paginate(10);
        $LackOfMotivationITStudents = $LackOfMotivationStudents5->whereIn('course_id', [10])->paginate(10);


        $RelationshipProblemAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having no close friends in school', 'Having no financial/emotional support', 'Having difficulty socializing'])->pluck('survey_response_answer_id');
        $RelationshipProblemResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $RelationshipProblemAnswers)->pluck('survey_response_id');
        $RelationshipProblemSurveyResponse = SurveyResponses::all()->whereIn('id', $RelationshipProblemResponseAnswers)->pluck('student_id');
        $RelationshipProblemStudents = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
        $RelationshipProblemStudents2 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
        $RelationshipProblemStudents3 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
        $RelationshipProblemStudents4 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
        $RelationshipProblemStudents5 = Student::whereIn('id', $RelationshipProblemSurveyResponse); //Query for all Students who are atleast having 1 relationship problem
       /* */ $RelationshipProblemCCSStudents = $RelationshipProblemStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 relationship problem
        $RelationshipProblemISStudents = $RelationshipProblemStudents2->whereIn('course_id', [7])->paginate(10);
        $RelationshipProblemCAStudents = $RelationshipProblemStudents3->whereIn('course_id', [8])->paginate(10);
        $RelationshipProblemComSciStudents = $RelationshipProblemStudents4->whereIn('course_id', [9])->paginate(10);
        $RelationshipProblemITStudents = $RelationshipProblemStudents5->whereIn('course_id', [10])->paginate(10);
        

        $StressAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Having trouble sleeping', 'Having health problems', 'Always feeling tired'])->pluck('survey_response_answer_id');
        $StressSurveyResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StressAnswers)->pluck('survey_response_id');
        $StressSurveyResponse = SurveyResponses::all()->whereIn('id', $StressSurveyResponseAnswers)->pluck('student_id');
        $StressStudents = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
        $StressStudents2 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
        $StressStudents3 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
        $StressStudents4 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
        $StressStudents5 = Student::whereIn('id', $StressSurveyResponse); //Query for all Students who are atleast having 1 Stress Management problem
      /* */  $StressCCSStudents = $StressStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Stress Management problem
        $StressISStudents = $StressStudents2->whereIn('course_id', [7])->paginate(10); 
        $StressCAStudents = $StressStudents3->whereIn('course_id', [8])->paginate(10); 
        $StressComSciStudents = $StressStudents4->whereIn('course_id', [9])->paginate(10); 
        $StressITStudents = $StressStudents5->whereIn('course_id', [10])->paginate(10); 


        $StudentTeacherAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Getting along with teachers', 'Anxious to approach teachers'])->pluck('survey_response_answer_id');
        $StudentTeacherResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $StudentTeacherAnswers)->pluck('survey_response_id');
        $StudentTeacherSurveyResponse = SurveyResponses::all()->whereIn('id', $StudentTeacherResponseAnswers)->pluck('student_id');
        $StudentTeacherStudents = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
        $StudentTeacherStudents2 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
        $StudentTeacherStudents3 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
        $StudentTeacherStudents4 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem
        $StudentTeacherStudents5 = Student::whereIn('id', $StudentTeacherSurveyResponse); //Query for all Students who are atleast having 1 Student Teacher problem     
        /* */$StudentTeacherCCSStudents = $StudentTeacherStudents->whereIn('course_id', $CCSCourses)->paginate(9); //Query for all Students from CCS who are atleast having 1 Student Teacher problem
        $StudentTeacherISStudents = $StudentTeacherStudents2->whereIn('course_id', [7])->paginate(10); 
        $StudentTeacherCAStudents = $StudentTeacherStudents3->whereIn('course_id', [8])->paginate(10); 
        $StudentTeacherComSciStudents = $StudentTeacherStudents4->whereIn('course_id', $BSComSciCourse)->paginate(9); 
        $StudentTeacherITStudents = $StudentTeacherStudents5->whereIn('course_id', [10])->paginate(10); 

       
      
        $SelfImageAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Struggling with sexual identity'])->pluck('survey_response_answer_id');
        $SelfImageResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $SelfImageAnswers)->pluck('survey_response_id');
        $SelfImageSurveyResponse = SurveyResponses::all()->whereIn('id', $SelfImageResponseAnswers)->pluck('student_id');
        $SelfImageStudents = Student::whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
        $SelfImageStudents2 = Student::whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
        $SelfImageStudents3 = Student::whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
        $SelfImageStudents4 = Student::whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
        $SelfImageStudents5 = Student::whereIn('id', $SelfImageSurveyResponse); //Query for all Students who are atleast having 1 Self-Image problem
       /* */  $SelfImageCCSStudents = $SelfImageStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Self-Image problem
        $SelfImageISStudents = $SelfImageStudents2->whereIn('course_id', [7])->paginate(10); 
        $SelfImageCAStudents = $SelfImageStudents3->whereIn('course_id', [8])->paginate(10); 
        $SelfImageComSciStudents = $SelfImageStudents4->whereIn('course_id', [9])->paginate(10); 
        $SelfImageITStudents = $SelfImageStudents5->whereIn('course_id', [10])->paginate(10); 

        $BullyingAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being bullied'])->pluck('survey_response_answer_id');
        $BullyingResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $BullyingAnswers)->pluck('survey_response_id');
        $BullyingSurveyResponse = SurveyResponses::all()->whereIn('id', $BullyingResponseAnswers)->pluck('student_id');
        $BulliedStudents = Student::whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
        $BulliedStudents2 = Student::whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
        $BulliedStudents3 = Student::whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
        $BulliedStudents4 = Student::whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
        $BulliedStudents5 = Student::whereIn('id', $BullyingSurveyResponse); //Query for all Students who are atleast having 1 Bullying problem
        /* */    $BulliedCCSStudents = $BulliedStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all Students from CCS who are atleast having 1 Bullying problem
        $BulliedISStudents = $BulliedStudents2->whereIn('course_id', [7])->paginate(10);
        $BulliedCAStudents = $BulliedStudents3->whereIn('course_id', [8])->paginate(10);
        $BulliedComSciStudents = $BulliedStudents4->whereIn('course_id', [9])->paginate(10);
        $BulliedITStudents = $BulliedStudents5->whereIn('course_id', [10])->paginate(10);
       

        $PeerPressureAnswers = AnswerChoice::all()->whereIn('answer_choice', ['Being pressured by friends'])->pluck('survey_response_answer_id');
        $PeerPressureResponseAnswers = SurveyResponseAnswers::all()->whereIn('id', $PeerPressureAnswers)->pluck('survey_response_id');
        $PeerPressureSurveyResponse = SurveyResponses::all()->whereIn('id', $PeerPressureResponseAnswers)->pluck('student_id');
        $PeerPressuredStudents = Student::whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
        $PeerPressuredStudents2 = Student::whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
        $PeerPressuredStudents3 = Student::whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
        $PeerPressuredStudents4 = Student::whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
        $PeerPressuredStudents5 = Student::whereIn('id', $PeerPressureSurveyResponse); //Query for all Students who are atleast having 1 Peer-pressure problem
        /* */  $PeerPressuredCCSStudents = $PeerPressuredStudents->whereIn('course_id', $CCSCourses)->paginate(10); //Query for all CCS Students who are atleast having 1 Peer-pressure problem
        $PeerPressuredISStudents = $PeerPressuredStudents2->whereIn('course_id', [7])->paginate(10);
        $PeerPressuredCAStudents = $PeerPressuredStudents3->whereIn('course_id', [8])->paginate(10);
        $PeerPressuredComSciStudents = $PeerPressuredStudents4->whereIn('course_id', [9])->paginate(10);
        $PeerPressuredITStudents = $PeerPressuredStudents5->whereIn('course_id', [10])->paginate(10);
        
        
        
        
        $CCSCoursesIDs = Course::all()->whereIn('coursecode', ['BSIS', 'BSCA', 'BSCS', 'BSIT'])->pluck('id');

        $CCScourse = Course::where('id', $course)->get();

        $CCSCollege = College::where('collegecode', "CCS")->get();

        

        $students = Student::whereIn('course_id', $CCSCoursesIDs);
        return view('studentlist')->with(['students' => $students, 'questioncategory' => $questioncategory, 'AnxiousCCSStudents' => $AnxiousCCSStudents, 'LackOfMotivationCCSStudents' => $LackOfMotivationCCSStudents,
        'RelationshipProblemCCSStudents' => $RelationshipProblemCCSStudents, 'StressCCSStudents' => $StressCCSStudents,
        'StudentTeacherCCSStudents' => $StudentTeacherCCSStudents, 'SelfImageCCSStudents' => $SelfImageCCSStudents,
        'BulliedCCSStudents' => $BulliedCCSStudents, 'PeerPressuredCCSStudents' => $PeerPressuredCCSStudents, 'CCScourse' => $CCScourse, 'CCSCollege' =>$CCSCollege,
        'AnxiousISStudents' => $AnxiousISStudents, 'AnxiousCAStudents' => $AnxiousCAStudents, 'AnxiousComSciStudents' => $AnxiousComSciStudents, 'AnxiousITStudents' => $AnxiousITStudents,
        'LackOfMotivationISStudents' => $LackOfMotivationISStudents, 'LackOfMotivationCAStudents' => $LackOfMotivationCAStudents, 'LackOfMotivationComSciStudents' => $LackOfMotivationComSciStudents, 'LackOfMotivationITStudents' => $LackOfMotivationITStudents,
        'RelationshipProblemISStudents' => $RelationshipProblemISStudents, 'RelationshipProblemCAStudents' => $RelationshipProblemCAStudents, 'RelationshipProblemComSciStudents' => $RelationshipProblemComSciStudents,'RelationshipProblemITStudents' => $RelationshipProblemITStudents,
        'StressISStudents' => $StressISStudents, 'StressCAStudents' => $StressCAStudents, 'StressComSciStudents' => $StressComSciStudents, 'StressITStudents' => $StressITStudents,
        'StudentTeacherISStudents' => $StudentTeacherISStudents, 'StudentTeacherCAStudents' => $StudentTeacherCAStudents, 'StudentTeacherComSciStudents' => $StudentTeacherComSciStudents, 'StudentTeacherITStudents' => $StudentTeacherITStudents,
        'SelfImageISStudents' => $SelfImageISStudents, 'SelfImageCAStudents' => $SelfImageCAStudents, 'SelfImageComSciStudents' => $SelfImageComSciStudents, 'SelfImageITStudents' => $SelfImageITStudents,
        'BulliedISStudents' => $BulliedISStudents, 'BulliedCAStudents' => $BulliedCAStudents, 'BulliedComSciStudents' => $BulliedComSciStudents, 'BulliedITStudents' => $BulliedITStudents,
        'PeerPressuredISStudents' => $PeerPressuredISStudents, 'PeerPressuredCAStudents' => $PeerPressuredCAStudents, 'PeerPressuredComSciStudents' => $PeerPressuredComSciStudents, 'PeerPressuredITStudents' => $PeerPressuredITStudents,
        'CCSCourses' => $CCSCourses]);
              
    }
}
