<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skrill extends Model
{
    protected $table = 'skrills';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
