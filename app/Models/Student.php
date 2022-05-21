<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class Student extends Authenticatable
{

    use HasFactory;
    
    protected $table = 'students';
    
    protected $guarded = ['email', 'password', 'firstname'];

   /* wtf is going on */


    protected $fillable = array('email', 'password', 'firstname');    
    public $timestamps = true;
    public static $rules = array();    

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password); //sets the data specified into something, bcrypt mutates it into encrypted, mostly used for passwords

    }


    public function SurveyResponses()
    {
        return $this->hasMany(SurveyResponses::class);
    }

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
}
