<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bkash extends Model
{
    protected $table = 'bkashes';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
