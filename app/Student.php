<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $fillable = ['name','email','phone','country','city','address','about','bio','visibility','date_of_birth'];
    
    public function studentEducation(){
        return $this->hasMany('App\StudentEducation');
    }

    public function studentExam(){
        return $this->hasMany('App\StudentExam');
    }

    public function studentDegree(){
        return $this->hasMany('App\StudentDegree');
    }

    public function jobs(){
        return $this->hasMany('App\StudentJob');
    }

    public function educationPreference(){
        return $this->hasOne('App\EducationPreference');
    }

    public function file(){
        return $this->belongsTo('App\File','image_id');
    }
    
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function course(){
        return $this->belongsToMany('App\Course', 'student_courses', 'student_id', 'course_id')->withPivot('status');
    }


}
