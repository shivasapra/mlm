<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commision extends Model
{
    protected $table = 'commisions';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
