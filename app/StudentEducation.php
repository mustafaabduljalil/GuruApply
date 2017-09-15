<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    //
    public function student(){
        return $this->belongsTo('App\Student');
    }
}
