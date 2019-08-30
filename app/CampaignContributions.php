<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignContributions extends Model
{
    protected $table = 'campaign_contributions';

    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }
}
