<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    //
    protected $fillable = ['name','email','address','phone','website','affiliation','accreditation','country','year_of_establishment','public','scholarship','profile','accommodation_details','logo_id','number_of_students'];
    
    public function brochures(){
        return $this->hasOne('App\Brochure');
    }
    public function basicEligibility(){
        return $this->hasOne('App\BasicEligibility');
    }
    public function multimedia(){
        return $this->hasMany('App\Multimedia');
    }
    public function  user(){
        return $this->belongsTo('App\User');
    }

    public function file(){
        return $this->belongsTo('App\File','logo_id');
    }

    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function exams(){
        return $this->hasMany('App\Exam');
    }
    
}
