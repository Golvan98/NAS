<?php
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use illuminate\Contracts\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyQuestionController;
use App\Http\Controllers\SurveyResponsesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QuestionChoiceController;
use App\Models\Survey;
use App\Models\SurveyQuestion;
use App\Models\QuestionChoice;
use App\Models\AnswerChoice;
use App\Models\SurveyResponseAnswer;
use App\Models\SurveyResponses;
use App\Models\Student;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/survey/{survey}', [SurveyQuestionController::class, 'surveyform'])->name('form');

Route::get('/createsurveyquestion/{survey}', [SurveyQuestionController::class, 'createquestion']);

Route::get('/questionlist/{survey}', [SurveyQuestionController::class, 'questionlist'])->name('surveyquestionlist');

Route::get('/questioneditor/{surveyquestion}', [SurveyQuestionController::class, 'questioneditor']);

Route::get('/surveyeditor/{survey}', [SurveyController::class, 'surveyeditor']);

Route::get('/surveycreator', [SurveyController::class, 'surveycreator']);

Route::post('/createsurvey', [SurveyController::class, 'createsurvey']);

Route::patch('/updatesurvey/{survey}', [SurveyController::class, 'updatesurvey']);

Route::get('/questioncreator/{survey}', [SurveyQuestionController::class, 'questioncreator']);

Route::post('createquestion/{survey}', [SurveyQuestionController::class, 'createquestion']);

Route::patch('/updatequestion/{surveyquestion}', [SurveyQuestionController::class, 'updatequestion']);

Route::delete('/deletequestion/{surveyquestion}', [SurveyQuestionController::class, 'deletequestion']);

Route::delete('/deletesurvey/{survey}', [SurveyController::class, 'deletesurvey']);

Route::get('/questionchoiceeditor/{SurveyQuestion}', [QuestionChoiceController::class, 'questionchoiceeditor'])->name('questionchoiceeditor');

Route::get('/questionchoiceedit/{QuestionChoice}', [QuestionChoiceController::class, 'questionchoiceedit']);

Route::patch('/updatequestionchoice/{QuestionChoice}', [QuestionChoiceController::class, 'updatequestionchoice']);

Route::delete('/deletequestionchoice/{QuestionChoice}', [QuestionChoiceController::class, 'destroyquestionchoice']);

Route::post('/createquestionchoice/[{SurveyQuestion}]', [QuestionChoiceController::class, 'createquestionchoice']);

Route::get('/divtestpage', function()
{
    return view('divtestpage');
});

Route::post('/createanswer/{survey}/{SurveyQuestion}', [SurveyQuestionController::class, 'createanswer']);

Route::post('/createmultiplechoiceanswer/{survey}/{SurveyQuestion}', [QuestionChoiceController::class, 'createanswerchoice']);

Route::get('/surveyform/{survey}', [SurveyQuestionController::class, 'surveyform']);


Route::get('/', function () {
    return view('originlayout');
});

Route::get('/home', function(){
    return view('/homepage');
})->name('balay');


Route::get('/login', [StudentController::class, 'testlogin']);

Route::post('/sessionlogin', [StudentController::class, 'sessionlogin']);

Route::post('/logout', [StudentController::class, 'testlogout']);

Route::get('testsurvey/{survey}', [SurveyController::class, 'testsurvey']);


Route::get('/surveylist', [SurveyController::class, 'listsurvey'])->name('allsurveys');

Route::get('/surveyresults/', [SurveyController::class, 'surveyresults'])->name('MgaData');

Route::get('/surveydata/{surveyquestioncategory}', [SurveyController::class, 'surveydata'])->name('tabledata');




Route::get('viewsurveys', [SurveyController::class, 'viewsurveys']);

Route::get('/viewsurvey/{survey}', [SurveyController::class, 'surveycategory']);

Route::get('/viewsurveyresult/{questioncategory}', [SurveyController::class, 'viewsurveyresult']);

/*
public function showsurvey(Survey $surveys, Question $questions)
    {
        

        $surveys = survey::where('id', $surveys->id)->get();     

      
        return view('/surveyholder')->with(['surveys' => $surveys]);
    }

    public function listsurvey(Survey $surveys, Question $questions)
    {

        $surveys = survey::all();

        return view('/surveylist')->with(['surveys' =>$surveys]);
    }

    public function surveyresults()
    {
        return view('/surveyresults');

    }

    public function surveydata()
    {
        return view('/surveydata');
    }
} */
