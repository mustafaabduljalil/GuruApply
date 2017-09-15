<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFees extends Model
{
    //
    protected $fillable = ['course_id','fees','fees_amount_dollar','fees_amount_indian','type'];


    public function course(){
        return $this->belongsTo('App\Course');
    }
}
