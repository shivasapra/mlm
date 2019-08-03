<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epin extends Model
{
    protected $table = 'epins';

    public function EpinCategory(){
        return $this->belongsTo('App\EpinCategory');
    }

    public function transfers(){
        return $this->hasMany('App\Transfer');
    }
}
