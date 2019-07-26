<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignUpdates extends Model
{
    protected $table = 'campaign_updates';

    public function campaign(){
        return $this->belongsto('App\Campaign');
    } 
}
