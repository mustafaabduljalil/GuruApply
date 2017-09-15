<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseScholarship extends Model
{
    //
    protected $fillable = ['course_id','description','url'];

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
