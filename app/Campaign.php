<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';

    public function user(){
        return $this->belongsto('App\User');
    } 

    public function perks(){
        return $this->hasMany('App\Perk');
    } 

    public function images(){
        return $this->hasMany('App\Images');
    } 

    public function updates(){
        return $this->hasMany('App\CampaignUpdates');
    } 
    public function CampaignContributions(){
        return $this->hasMany('App\CampaignContributions');
    }
}
