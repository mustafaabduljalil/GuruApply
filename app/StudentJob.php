<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentJob extends Model
{
    //
    protected $fillable = ['position','company','start_year','end_year','description','student_id'];

    public function student(){
        return $this->belongsTo('App\Student');
    }

}
