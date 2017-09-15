<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brochure extends Model
{
    //
    protected $fillable = ['name','file_id','institution_id','url'];

    public function file(){
        return $this->hasOne('App\File');
    }
}
