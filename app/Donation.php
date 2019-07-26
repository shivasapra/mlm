<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
