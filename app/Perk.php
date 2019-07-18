<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perk extends Model
{
    protected $table = 'perks';

    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }

    public function shippings(){
        return $this->hasMany('App\Shipping');
    }
}
