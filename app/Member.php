<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //Retrieve the group this membership belongs to
    public function group(){
        return $this->belongsTo('App\Group');
    }
    //Retrieve the user this membership belongs to
    public function user(){
        return $this->belongsTo('App\User');
    }
}