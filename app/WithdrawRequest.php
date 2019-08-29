<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    protected $table = 'withdraw_requests';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
