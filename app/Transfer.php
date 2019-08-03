<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $table = 'transfers';

    public function epin(){
        return $this->belongsTo('App\Epin');
    }
}
