<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudentGuide extends Model
{
    //

    protected $fillable = ['course_id','main_title','image_id','title','description','sub_title','sub_description','url','file_id'];


    public function course(){
        return $this->belognsTo('App\Course','course_guides','course_id','guide_id');
    }

    public function file(){
        return $this->belongsTo('App\File','image_id');
    }
}
