<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $table = 'causes';


    public function subcauses(){
        return $this->hasMany('App\Subcause');
    }
}
