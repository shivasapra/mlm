<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Details;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class UserController extends Controller
{
    public function accountSettings(User $user){
        return view('user.accountSettings')->with('user',$user);
    }

    public function updateProfile(Request $request,User $user){
        if($request->security_pin == Auth::user()->details->security_pin){
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
            Session::flash('success','Details Updated!!');
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
        }
        return redirect()->back()->with('user',$user);
    }

    public function updatePassword(Request $request,User $user){
        if (Hash::check($request->old_password,Auth::user()->password)) {
            $v = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            if ($v->fails()) {
                Session::flash('warning','Wrong Confirmation!!');
                return redirect()->back()->with('user',$user);
            }
            else{
                $user->password = bcrypt($request->password);
                Session::flash('success','Password Changed!!');
                return redirect()->back()->with('user',$user);
            }
        }else{
            Session::flash('warning','Incorrect Old Password');
            return redirect()->back()->with('user',$user);
        }
    }
}
