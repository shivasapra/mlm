<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ContributionPackages;
use App\Donation;
use App\Coordinates;
use App\Details;
use Auth;
use App\Settings;
use Mail;

class ContributionController extends Controller
{
    public function packages(User $user){
        return view('contribution.packages')->with('user',$user)->with('packages',ContributionPackages::all());
    }

    public function donations(User $user){
        return view('contribution.donations')->with('user',$user);
    }

    public function contribute(Request $request,Donation $donation){
        $donation->user_id = Auth::user()->id;
        $donation->package = $request->package;
        $donation->amount = $request->amount;
        $donation->save();
        if($parent_user = Details::where('username',Auth::user()->details->invited_by)->first()->user){
            $parent_amount = Settings::first()->level_two_percentage;
            $data = ['parent_user' => $parent_user, 'user' => Auth::user(), 'amount'=> $parent_amount];
            $contactEmail = $parent_user->email;
            Mail::send('emails.parents', $data, function($message) use ($contactEmail)
            {  
                $message->to($contactEmail)->subject('Contribution Amount!!');
            });

            if($super_parent_user = User::find($parent_user->coordinates->parent)){
                $super_parent_amount = Settings::first()->level_one_percentage;
                $data = ['super_parent_user' => $super_parent_user, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
                $contactEmail = $super_parent_user->email;
                Mail::send('emails.superParents', $data, function($message) use ($contactEmail)
                {  
                    $message->to($contactEmail)->subject('Contribution Amount!!');
                });
                
                if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                    //
                }
            }
        }

        $data = ['user'=>Auth::user()];
        $contactEmail = Auth::user()->email;
        Mail::send('emails.thankYou', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Thankyou');
        });

        if(Auth::user()->coordinates == null){
            $coordinates = new Coordinates;
            $coordinates->user_id = Auth::user()->id;
            $coordinates->row = $parent_user->coordinates->row + 1 ;
            if($parent_user->coordinates->children == null ){
                $coordinates->column = $parent_user->coordinates->column - 2 ;
                $coordinates->self_position_wrt_parent = 1;
            }elseif(count(explode(',',$parent_user->coordinates->children)) == 5){
                // we have to add this node in tree  one level down;
            }else{
                $coordinates->column = $parent_user->coordinates->column + count(explode(',',$parent_user->coordinates->children)) + (-2);
                $coordinates->self_position_wrt_parent = count(explode(',',$parent_user->coordinates->children)) + 1;
            }
            $coordinates->parent = $parent_user->id;
            $coordinates->save();
            
            $parent_user->coordinates->children = ($parent_user->coordinates->children == null) ? Auth::user()->id : $parent_user->coordinates->children.','.Auth::user()->id;
            $parent_user->coordinates->save();
            
            if($super_parent_user != null){
                $coordinates->super_parent = $super_parent_user->id;
                $super_parent_user->coordinates->super_children = ($super_parent_user->coordinates->super_children == null) ? Auth::user()->id : $super_parent_user->coordinates->super_children.','.Auth::user()->id;
                $super_parent_user->coordinates->save();
            }

            if($super_duper_parent_user != null){
                $coordinates->super_duper_parent = $super_duper_parent_user->id;
                $super_duper_parent_user->coordinates->super_duper_children = ($super_duper_parent_user->coordinates->super_duper_children == null) ? Auth::user()->id : $super_duper_parent_user->coordinates->super_duper_children.','.Auth::user()->id;
                $super_duper_parent_user->coordinates->save();
                $coordinates->save();
            }
        }
        return redirect()->back();
    }
}
