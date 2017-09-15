<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['name','duration','level','description','views','degree','institution_id'];


    public function requirements(){
        return $this->hasMany('App\CourseRequirement');
    }

    public function sholarships(){
        return $this->hasMany('App\CourseScholarship');
    }

    public function steps(){
        return $this->hasMany('App\CourseStep');
    }

    public function placement(){
        return $this->hasMany('App\CoursePlacement');
    }

    public function studentGuide(){
        return $this->belongsToMany('App\CourseStudentGuide','course_guides','course_id','guide_id');
    }

    public function fees(){
        return $this->hasMany('App\CourseFees');
    }

    public function institution(){
        return $this->belongsTo('App\Institution');

    }

    public function student(){
        return $this->belongsToMany('App\Student', 'student_courses', 'course_id', 'student_id');
    }


}
