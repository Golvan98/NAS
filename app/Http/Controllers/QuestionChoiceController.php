<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionChoiceController extends Controller
{
    public function createanswerchoice()
    {
        $array = request()->get('question_choice');

        dd($array);

    }
}
