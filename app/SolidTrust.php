<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolidTrust extends Model
{
    protected $table = 'solid_trusts';
    public function user(){
        return $this->belongsTo('App\User');
    }
}
