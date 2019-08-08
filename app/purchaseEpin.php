<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchaseEpin extends Model
{
    protected $table = 'purchase_epins';

    public function epin(){
        return $this->belongsTo('App\Epin');
    }
}
