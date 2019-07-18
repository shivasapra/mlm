<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    public function perk(){
        return $this->belongsTo('App\Perk');
    }
}
