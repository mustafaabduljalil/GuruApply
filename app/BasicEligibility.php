<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicEligibility extends Model
{
    //
    public function institution(){
        return $this->belongsTo('App\Institution');
    }
}
