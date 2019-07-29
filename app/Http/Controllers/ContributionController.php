<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ContributionPackages;
use App\Donation;
use App\Coordinates;
use App\Details;
use Auth;
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
        $package = ContributionPackages::find($request->package_id);
        $donation->user_id = Auth::user()->id;
        $donation->package = $package->package;
        $donation->level = $package->level;
        $donation->amount = $package->amount;
        $donation->save();

        if(Auth::user()->coordinates == null){
            $parent_user = Details::where('username',Auth::user()->details->invited_by)->first()->user;

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
            $coordinates->super_parent = $parent_user->coordinates->parent;
            $coordinates->parent = $parent_user->id;
            $coordinates->save();

            $parent_user->coordinates->children = ($parent_user->coordinates->children == null) ? Auth::user()->id : $parent_user->coordinates->children.','.Auth::user()->id;
            $parent_user->coordinates->save();

            if($coordinates->super_parent != null){
                $super_parent_user = User::find($coordinates->super_parent);
                $super_parent_user->coordinates->super_children = ($super_parent_user->coordinates->super_children == null) ? Auth::user()->id : $super_parent_user->coordinates->super_children.','.Auth::user()->id;
                $super_parent_user->coordinates->save();
            }

            $data = ['parent_user' => $parent_user, 'user' => Auth::user()];
            $contactEmail = $parent_user->email;
            Mail::send('emails.parents', $data, function($message) use ($contactEmail)
            {  
                $message->to($contactEmail)->subject('New User Added!!');
            });
        }
        return redirect()->back();
    }
}
