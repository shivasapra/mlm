<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpinRequests extends Model
{
    protected $table = 'epin_requests';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
