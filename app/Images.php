<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    public function campaign(){
        return $this->belongsto('App\Campaign');
    } 
}
