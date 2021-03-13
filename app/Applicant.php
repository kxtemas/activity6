<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //Retrieve the group this membership belongs to
    public function job(){
        return $this->belongsTo('App\Job');
    }
    //Retrieve the user this membership belongs to
    public function user(){
        return $this->belongsTo('App\User');
    }
}