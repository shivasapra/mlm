<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payza extends Model
{
    protected $table = 'payzas';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
