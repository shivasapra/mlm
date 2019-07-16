<?php

namespace App\Http\Controllers;
use App\User;
use Session;
use App\BankTransfer;
use App\Paypal;
use App\Payza;
use App\Skrill;
use App\PerfectMoney;
use App\Bkash;
use App\SolidTrust;
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

    public function updatePerfectMoney(Request $request,User $user){
        if($user->details->security_pin == $request->security_pin){
        if($user->perfectMoney != null) { $perfectMoney =  $user->perfectMoney; } else { $perfectMoney =  new PerfectMoney; } 
            $perfectMoney->user_id = $user->id;
            $perfectMoney->currency = $request->currency;
            $perfectMoney->account_id = $request->account_id;
            $perfectMoney->account_name = $request->account_name;
            $perfectMoney->status = $request->status;
            $perfectMoney->save();
            Session::flash('success','Perfect Money Details Updated');
            return redirect()->back();
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
            return redirect()->back();
        }
    }

    public function updatePayza(Request $request,User $user){
        if($user->details->security_pin == $request->security_pin){
        if($user->payza != null) { $payza =  $user->payza; } else { $payza =  new Payza; } 
            $payza->user_id = $user->id;
            $payza->currency = $request->currency;
            $payza->account_email_id = $request->account_email_id;
            $payza->account_name = $request->account_name;
            $payza->status = $request->status;
            $payza->save();
            Session::flash('success','Payza Details Updated');
            return redirect()->back();
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
            return redirect()->back();
        }
    }

    public function updateSkrill(Request $request,User $user){
        if($user->details->security_pin == $request->security_pin){
        if($user->bkash != null) { $skrill =  $user->skrill; } else { $skrill =  new Skrill; } 
            $skrill->user_id = $user->id;
            $skrill->currency = $request->currency;
            $skrill->account_email_id = $request->account_email_id;
            $skrill->account_name = $request->account_name;
            $skrill->status = $request->status;
            $skrill->save();
            Session::flash('success','Skrill Details Updated');
            return redirect()->back();
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
            return redirect()->back();
        }
    }

    public function updateBkash(Request $request,User $user){
        if($user->details->security_pin == $request->security_pin){
        if($user->bkash != null) { $bkash =  $user->bkash; } else { $bkash =  new Bkash; } 
            $bkash->user_id = $user->id;
            $bkash->currency = $request->currency;
            $bkash->account_no = $request->account_no;
            $bkash->account_name = $request->account_name;
            $bkash->status = $request->status;
            $bkash->save();
            Session::flash('success','Bkash Details Updated');
            return redirect()->back();
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
            return redirect()->back();
        }
    }

    public function updateSolidTrust(Request $request,User $user){
        if($user->details->security_pin == $request->security_pin){
        if($user->solidTrust != null) { $solidTrust =  $user->solidTrust; } else { $solidTrust =  new SolidTrust; } 
            $solidTrust->user_id = $user->id;
            $solidTrust->currency = $request->currency;
            $solidTrust->account_user_name = $request->account_user_name;
            $solidTrust->account_name = $request->account_name;
            $solidTrust->status = $request->status;
            $solidTrust->save();
            Session::flash('success','Solid Trust Details Updated');
            return redirect()->back();
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
            return redirect()->back();
        }
    }
    
}
