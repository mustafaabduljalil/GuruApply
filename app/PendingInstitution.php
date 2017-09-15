<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingInstitution extends Model
{
    //
    protected $fillable = ['institution_name','person_name','institution_email','institution_phone','pending'];
    
}
