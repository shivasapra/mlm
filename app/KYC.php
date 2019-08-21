<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KYC extends Model
{   
    protected $table = 'k_y_c_s' ;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
