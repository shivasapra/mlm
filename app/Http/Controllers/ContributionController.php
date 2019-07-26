<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ContributionController extends Controller
{
    public function packages(User $user){
        return view('contribution.packages')->with('user',$user);
    }

    public function donations(User $user){
        return view('contribution.donations')->with('user',$user);
    }
}
