<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CampaignController extends Controller
{
    public function create(User $user){
        return view('campaign.create')->with('user',$user);
    }

    public function index(User $user){
        return view('campaign.index')->with('user',$user);
    }
}
