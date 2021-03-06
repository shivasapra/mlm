<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use App\Details;
use Mail;
use App\KYC;
use App\Ticket;

class UserController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function accountSettings(User $user){
        return view('accountSettings')->with('user',$user);
    }

    public function updateProfile(Request $request,User $user){
        if($request->security_pin == Auth::user()->details->security_pin){
            $details = $user->details;
            $details->sex = $request->sex;
            $details->DOB = $request->DOB;
            $details->full_name = $request->full_name;
            $details->user->name = $request->full_name;
            $details->user->save();
            $details->address = $request->address;
            $details->state = $request->state;
            $details->district = $request->district;
            $details->city = $request->city;
            $details->country = $request->country;
            $details->mobile = $request->mobile;
            $details->postal_code = $request->postal_code;
            $details->skype_id = $request->skype_id;
            $details->pan_no = $request->pan_no;

            

            if($request->hasFile('avatar')){
                $avatar = $request->avatar;
                $avatar_new_name = time().$avatar->getClientOriginalName();
                $avatar->move('uploads/avatar',$avatar_new_name);
                $details->avatar = 'uploads/avatar/'.$avatar_new_name;
            }
            $details->save();
            if($request->email != $details->user->email ){
                $details->user->email = $request->email;
                $details->user->save();
                $details->email_verification = 0;
                do{
                    $verify_token = str_random();
                }while(Details::where('verify_token',$verify_token)->first());
                $details->verify_token = $verify_token;
                $details->save();
        
                $contactEmail = $details->user->email;
                $data = ['user' => $user, 'security_pin'=> $details->security_pin, 'verify_token'=> $details->verify_token];
                Mail::send('emails.registered', $data, function($message) use ($contactEmail)
                {  
                    $message->to($contactEmail)->subject('Registered!!');
                });

            }
            Session::flash('success','Details Updated!!');
        }
        else{
            Session::flash('warning','Wrong Security Pin!!');
        }
        return redirect()->back()->with('user',$user);
    }

    public function updateEmail(Request $request,User $user){
            $user->email = $request->new_email;
            $user->save();
            Session::flash('success','Email Updated!!');
            return redirect()->back()->with('user',$user);
    }

    public function updateMobile(Request $request,User $user){
        $user->details->mobile = $request->new_mobile;
        $user->details->save();
        Session::flash('success','Mobile Number Updated!!');
        return redirect()->back()->with('user',$user);
    }

    public function updatePin(Request $request,User $user){
        if($request->old_pin == $user->details->security_pin){
            if($request->new_pin == $request->new_pin_confirm){
                $user->details->security_pin = $request->new_pin;
                $user->details->save();
                Session::flash('success','Pin Changed!!');
                return redirect()->back()->with('user',$user);    
            }
            else{
                Session::flash('warning','Wrong Confirmation!!');
                return redirect()->back()->with('user',$user);    
            }
        }
        else{
            Session::flash('warning','Incorrect Old Pin!!');
            return redirect()->back()->with('user',$user);
        }
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
                $user->save();
                Session::flash('success','Password Changed!!');
                return redirect()->back()->with('user',$user);
            }
        }else{
            Session::flash('warning','Incorrect Old Password');
            return redirect()->back()->with('user',$user);
        }
    }

    public function KYC(User $user){
        return view('KYC')->with('user',$user);
    }

    public function viewKYC(){
        return view('viewKYC')->with('kycs',Kyc::all());
    }

    public function approveKYC(KYC $k){
        $k->approved = 1;
        $k->save();
        Session::flash('success','KYC Approved!!');
        return redirect()->back();
    }

    public function identityProof(Request $request, User $user, KYC $kyc){
        $kyc->user_id = $user->id;
        $kyc->proof_for = 'Identity';
        $kyc->type = $request->identity_proof;

        if($request->hasFile('identity_p')){
            $attachment = $request->identity_p;
            $attachment_new_name = time().$attachment->getClientOriginalName();
            $attachment->move('uploads/proof',$attachment_new_name);
            $kyc->proof = 'uploads/proof/'.$attachment_new_name;
        }


        $kyc->save();
        Session::flash('success','Identity Poof Uploaded');
        return redirect()->route('account.settings',$user);
    }

    public function addressProof(Request $request, User $user, KYC $kyc){
        $kyc->user_id = $user->id;
        $kyc->proof_for = 'Address';
        $kyc->type = $request->address_proof;
        
        
        if($request->hasFile('address_p')){
            $attachment = $request->address_p;
            $attachment_new_name = time().$attachment->getClientOriginalName();
            $attachment->move('uploads/proof',$attachment_new_name);
            $kyc->proof = 'uploads/proof/'.$attachment_new_name;
        }


        $kyc->save();
        Session::flash('success','Address Poof Uploaded');
        return redirect()->route('account.settings',$user);
    }

    public function taxProof(Request $request, User $user, KYC $kyc){
        $kyc->user_id = $user->id;
        $kyc->proof_for = 'Tax ID';
        
        
        if($request->hasFile('tax_p')){
            $attachment = $request->tax_p;
            $attachment_new_name = time().$attachment->getClientOriginalName();
            $attachment->move('uploads/proof',$attachment_new_name);
            $kyc->proof = 'uploads/proof/'.$attachment_new_name;
        }

        $kyc->save();
        Session::flash('success','Tax Id Uploaded');
        return redirect()->route('account.settings',$user);
    }

    

    public function supportCreateTickets(){
        return view('support.createTickets');
    }

    public function supportViewTickets(){
        return view('support.viewTickets');
    }


    public function storeTicket(Request $request, Ticket $ticket){
        $ticket->user_id = Auth::id();
        $ticket->category = $request->category;
        $ticket->priority = $request->priority;
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;

        if($request->hasFile('attachment')){
            $attachment = $request->attachment;
            $attachment_new_name = time().$attachment->getClientOriginalName();
            $attachment->move('uploads/ticket',$attachment_new_name);
            $ticket->attachment = 'uploads/ticket/'.$attachment_new_name;
        }
        $ticket->save();

        Session::flash('success','Ticket Added!!');
        return redirect()->route('support.viewTickets');
    }

    public function tickets(){
        return view('support.tickets')->with('tickets',Ticket::all());
    }

    public function approveTicket(Ticket $t){
        $t->status = 1;
        $t->save();

        Session::flash('success','Ticket Approved');
        return redirect()->back();
    }
}
