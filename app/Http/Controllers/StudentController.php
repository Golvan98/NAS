<?php

namespace App\Http\Controllers;
use illuminate\Support\Facades\Auth;
use illuminate\Contracts\Auth\user as Authenticatable;
use Illuminate\Http\Request;
use App\Models\Student;



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

    public function studentlist()
    {
        $students = Student::where('id', '<>', 0 )->simplePaginate(11);
                
        return view('studentlist')->with(['students' => $students]);
       
    }
}
