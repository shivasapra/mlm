<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epin extends Model
{
    protected $table = 'epins';

    public function category(){
        return $this->belongsTo('App\EpinCategory');
    }
}
