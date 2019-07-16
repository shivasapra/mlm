<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfectMoney extends Model
{
    protected $table = 'perfect_money';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
