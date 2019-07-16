<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Details;

class UserController extends Controller
{
    public function accountSettings(User $user){
        return view('user.accountSettings')->with('user',$user);
    }

    public function updateProfile(Request $request,User $user){
        $details = $user->details;
        $details->sex = $request->sex;
        $details->DOB = $request->DOB;
        $details->address = $request->address;
        $details->state = $request->state;
        $details->district = $request->district;
        $details->city = $request->city;
        $details->postal_code = $request->postal_code;
        $details->skype_id = $request->skype_id;
        $details->pan_no = $request->pan_no;
        $details->save();
        return redirect()->back()->with('user',$user);
    }
}
