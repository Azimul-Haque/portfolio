<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    public function officerduties(){
        return $this->hasMany('App\Officerduty');
    }
}
