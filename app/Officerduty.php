<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officerduty extends Model
{
    public function officer(){
        return $this->belongsTo('App\Officer');
    }
}
