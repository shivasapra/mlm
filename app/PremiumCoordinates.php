<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PremiumCoordinates extends Model
{
    protected $table = 'premium_coordinates';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
