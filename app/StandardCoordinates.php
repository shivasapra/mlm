<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandardCoordinates extends Model
{
    protected $table = 'standard_ coordinates';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
