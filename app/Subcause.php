<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcause extends Model
{
    protected $table = 'subcauses';


    public function cause(){
        return $this->belongsTo('App\Cause');
    }
}
