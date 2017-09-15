<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStep extends Model
{
    //
    protected $fillable = ['course_id','description','title','step_number'];

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
