<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankTransfer extends Model
{   
    protected $table = 'bank_transfers';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
