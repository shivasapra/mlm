<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';

    public function user(){
        return $this->belongsto('App\User');
    } 

    public function perks(){
        return $this->hasMany('App\Perk');
    } 
}
