<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpinCategory extends Model
{
    protected $table = 'epin_categories';

    public function epins(){
        return $this->hasMany('App\Epin');
    }
}
