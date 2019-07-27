<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinates extends Model
{
    protected $table = 'coordinates';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
