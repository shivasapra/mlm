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
use App\Epin;

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
        
        if(Auth::id() != 1){
            if($parent_user = Details::where('username',Auth::user()->details->invited_by)->first()->user){
                $parent_amount = Settings::first()->level_three_percentage;
                $data = ['name' => $parent_user->name, 'user' => Auth::user(), 'amount'=> $parent_amount];
                $contactEmail = $parent_user->email;
                Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
                {  
                    $message->to($contactEmail)->subject('Contribution Amount!!');
                });

                if($super_parent_user = User::find($parent_user->coordinates->parent)){
                    $super_parent_amount = Settings::first()->level_two_percentage;
                    $data = ['name' => $super_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
                    $contactEmail = $super_parent_user->email;
                    Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
                    {  
                        $message->to($contactEmail)->subject('Contribution Amount!!');
                    });

                    if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                        $super_duper_parent_amount = Settings::first()->level_one_percentage;
                        $data = ['name' => $super_duper_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
                        $contactEmail = $super_duper_parent_user->email;
                        Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
                        {  
                            $message->to($contactEmail)->subject('Contribution Amount!!');
                        });
                    }
                }else{
                    $super_duper_parent_user = null;
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
            if(count(explode(',',$parent_user->coordinates->children)) != 5){
                if($parent_user->coordinates->children == null ){
                    $coordinates->column = $parent_user->coordinates->column - 2 ;
                    $coordinates->self_position_wrt_parent = 1;
                }else{
                    $coordinates->column = $parent_user->coordinates->column + count(explode(',',$parent_user->coordinates->children)) + (-2);
                    $coordinates->self_position_wrt_parent = count(explode(',',$parent_user->coordinates->children)) + 1;
                }

                $coordinates->row = $parent_user->coordinates->row + 1 ;
                $coordinates->parent = $parent_user->id;
                
                $parent_user->coordinates->children = ($parent_user->coordinates->children == null) ? Auth::user()->id : $parent_user->coordinates->children.','.Auth::user()->id;
                $parent_user->coordinates->save();
                
                if($super_parent_user){
                    $coordinates->super_parent = $super_parent_user->id;
                    $super_parent_user->coordinates->super_children = ($super_parent_user->coordinates->super_children == null) ? Auth::user()->id : $super_parent_user->coordinates->super_children.','.Auth::user()->id;
                    $super_parent_user->coordinates->save();
                }

                if($super_duper_parent_user){
                    $coordinates->super_duper_parent = $super_duper_parent_user->id;
                    $super_duper_parent_user->coordinates->super_duper_children = ($super_duper_parent_user->coordinates->super_duper_children == null) ? Auth::user()->id : $super_duper_parent_user->coordinates->super_duper_children.','.Auth::user()->id;
                    $super_duper_parent_user->coordinates->save();
                }
            }else{
                if(count(explode(',',$parent_user->coordinates->super_children)) == 25){

                }elseif(count(explode(',',$parent_user->coordinates->super_duper_children)) == 125){

                }
            }
            $coordinates->save();
        }
        $donation->save();
        return redirect()->back();
    }

    public function epins(User $user){
        return view('contribution.epins')->with('user',$user);
    }

    public function generateEpin(Request $request,User $user){
        for ($i= 0; $i < $request->no; $i++) { 
            do {
                $new_epin = str_random();
            }
            while(Epin::where('epin', $new_epin)->first());
            $epin = new Epin;
            $epin->user_id = $user->id;
            $epin->epin = $new_epin;
            $epin->amount = $request->amount;
            $epin->save();
        }
        return view('contribution.epins')->with('user',$user);
    }

    public function viewer(User $user){
        return view('contribution.viewer')->with('user',$user);
    }

    // public function matrix(){
    //     $user = Auth::user();
    //     $arr = array(
    //         $user->name => $this->findChildren($user->id),

    //     );
    //     // $array = array(
    //     //     'shiva Sapra'=>['Vineet Chauhan','Aslam Khan'],
    //     //     'vineet Chauhan'=>['Ashish Sapra','Jagdish Ranjha']
    //     // );
    //     dd($arr);
    // }

    // private function findChildren($id){
    //     $children = array();
    //     foreach(collect(explode(',',User::find($id)->coordinates->children)) as $child){
    //         array_push($children,User::find($child)->name);
    //     }
    //     return $children;
    // }
}
