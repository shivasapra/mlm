<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function details(){
        return $this->hasOne('App\Details');
    }

    public function bankTransfer(){
        return $this->hasOne('App\BankTransfer');
    }
    public function paypal(){
        return $this->hasOne('App\Paypal');
    }
    public function perfectMoney(){
        return $this->hasOne('App\PerfectMoney');
    }

    public function payza(){
        return $this->hasOne('App\Payza');
    }
    public function skrill(){
        return $this->hasOne('App\Skrill');
    }
    public function bkash(){
        return $this->hasOne('App\Bkash');
    }
    public function solidTrust(){
        return $this->hasOne('App\SolidTrust');
    }
    public function KYC(){
        return $this->hasMany('App\KYC');
    }
    public function campaigns(){
        return $this->hasMany('App\Campaign');
    }
    public function donations(){
        return $this->hasMany('App\Donation');
    }
    public function coordinates(){
        return $this->hasOne('App\Coordinates');
    }
}
