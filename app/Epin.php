<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epin extends Model
{
    protected $table = 'epins';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
