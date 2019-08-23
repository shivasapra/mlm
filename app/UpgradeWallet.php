<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpgradeWallet extends Model
{
    protected $table = 'upgrade_wallets';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
