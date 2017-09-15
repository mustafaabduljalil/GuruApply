<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    //
    protected $fillable = ['institution_id','file_id','type'];

    public function file(){
        return $this->belongsTo('App\File','file_id');
    }
    public function institution(){
        return $this->belongsTo('App\Institution','institution_id');
    }
}
