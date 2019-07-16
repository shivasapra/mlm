<?php

namespace App\Http\Controllers;
use App\User;
use Session;
use App\BankTransfer;
use App\Paypal;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index(User $user){
        return view('assignmentSettings')->with('user',$user);
    }

    public function updateBankTransfer(Request $request,User $user){
        if($user->details->security_pin == $request->security_pin){
        if($user->bankTransfer != null) { $bankTransfer =  $user->bankTransfer; } else { $bankTransfer =  new BankTransfer; } 
            $bankTransfer->user_id = $user->id;
            $bankTransfer->currency = $request->currency;
            $bankTransfer->account_type = $request->account_type;
            $bankTransfer->nick_name = $request->nick_name;
            $bankTransfer->account_holder_name = $request->account_holder_name;
            $bankTransfer->account_no = $request->account_no;
            $bankTransfer->bank_name = $request->bank_name;
            $bankTransfer->bank_branch = $request->bank_branch;
            $bankTransfer->IFSC_code = $request->IFSC_code;
            $bankTransfer->status = $request->status;
            $bankTransfer->save();
            Session::flash('success','Bank Transfer Details Updated');
            return redirect()->back();
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
            return redirect()->back();
        }
    }

    public function updatePaypal(Request $request,User $user){
        if($user->details->security_pin == $request->security_pin){
        if($user->paypal != null) { $paypal =  $user->paypal; } else { $paypal =  new Paypal; } 
            $paypal->user_id = $user->id;
            $paypal->currency = $request->currency;
            $paypal->account_id = $request->account_id;
            $paypal->account_name = $request->account_name;
            $paypal->status = $request->status;
            $paypal->save();
            Session::flash('success','Paypal Details Updated');
            return redirect()->back();
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
            return redirect()->back();
        }
    }
    
}
