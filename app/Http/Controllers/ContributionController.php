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
use Carbon\Carbon;
use App\Transfer;
use Session;

class ContributionController extends Controller
{
    public function packages(User $user){
        return view('contribution.packages')->with('user',$user)->with('packages',ContributionPackages::all());
    }

    public function donations(User $user){
        return view('contribution.donations')->with('user',$user);
    }

    private function verifyEpin($request){
        $epin = Epin::where('epin',$request->epin)->first();
        if(!$epin->count() or $epin->used_by != null){
            Session::flash('warning','Wrong Epin!!');
            return redirect()->back();
        }elseif($epin->transfers->count() and Transfer::where('epin_id',$epin->id)->orderBy('id','desc')->first()->to != Auth::id()){
            Session::flash('warning','Wrong Epin!!');
            return redirect()->back();
        }
        $epin->used_by = Auth::user()->id;
        $epin->used_at = Carbon::now();
        $epin->save();
    }

    private function donate($request, $donation){
        $donation->user_id = Auth::user()->id;
        $donation->package = $request->package;
        $donation->amount = $request->amount;
        $donation->save();
        $data = ['user'=>Auth::user()];
        $contactEmail = Auth::user()->email;
        Mail::send('emails.thankYou', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Thankyou');
        });
    }

    public function contribute(Request $request, Donation $donation){
        
        $this->verifyEpin($request);
        $this->donate($request, $donation);
        
        if(!Auth::user()->admin and Auth::user()->coordinates == null){
            $coordinates = new Coordinates;
            $coordinates->user_id = Auth::user()->id;

            $temp = Details::where('username',Auth::user()->details->invited_by)->first()->user;
            if(count(explode(',',$temp->coordinates->children)) < 5){
                $parent_user = $temp;
            }else{
                $collection = $temp->coordinates->children->concat($temp->coordinates->super_children)->concat($temp->coordinates->super_duper_children);
                foreach($collection as $c){
                    if(count(explode(',',User::find($c)->coordinates->children)) < 5){
                        $parent_user = User::find($c);
                        break;
                    }
                }
            }

            $coordinates->row = $parent_user->coordinates->row + 1 ;
            $coordinates->parent = $parent_user->id;

            if($parent_user->coordinates->children == null ){
                $coordinates->column = $parent_user->coordinates->column - 2 ;
                $coordinates->self_position_wrt_parent = 1;
            }else{
                $coordinates->column = $parent_user->coordinates->column + count(explode(',',$parent_user->coordinates->children)) + (-2);
                $coordinates->self_position_wrt_parent = count(explode(',',$parent_user->coordinates->children)) + 1;
            }
            $parent_user->coordinates->children = ($parent_user->coordinates->children == null) ? Auth::user()->id : $parent_user->coordinates->children.','.Auth::user()->id;
            $parent_user->coordinates->save();


            if($super_parent_user = User::find($parent_user->coordinates->parent)){
                $coordinates->super_parent = $super_parent_user->id;
                $super_parent_user->coordinates->super_children = ($super_parent_user->coordinates->super_children == null) ? Auth::user()->id : $super_parent_user->coordinates->super_children.','.Auth::user()->id;
                $super_parent_user->coordinates->save();

                if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                    $coordinates->super_duper_parent = $super_duper_parent_user->id;
                    $super_duper_parent_user->coordinates->super_duper_children = ($super_duper_parent_user->coordinates->super_duper_children == null) ? Auth::user()->id : $super_duper_parent_user->coordinates->super_duper_children.','.Auth::user()->id;
                    $super_duper_parent_user->coordinates->save();
                }
            }
            $coordinates->save();
        }
        
        
        return redirect()->back();
    }

    

    public function viewer(User $user){
        return view('contribution.viewer')->with('user',$user);
    }

    public function UsernameSearch(Request $request){
        if($request->ajax()){
            $output= "";
            $usernames = Details::where('username','LIKE','%'.$request->search."%")->get();
            if($usernames){
                    foreach ($usernames as $key => $product) {
                        $output.='<option onClick="UsernameAssign(this)" value="'.$product->username.'">'.$product->username.'</option>';
                    }
                return Response($output);
            }
        }
    }

    private function sendMail($data, $contactEmail){
        // $parent_amount = Settings::first()->level_three_percentage;
        //         $data = ['name' => $parent_user->name, 'user' => Auth::user(), 'amount'=> $parent_amount];
        //         $contactEmail = $parent_user->email;
        //         $this->sendMail($data ,$contactEmail);
        // $super_parent_amount = Settings::first()->level_two_percentage;
        //                     $data = ['name' => $super_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
        //                     $contactEmail = $super_parent_user->email;
        //                     $this->sendMail($data ,$contactEmail);
        // $super_duper_parent_amount = Settings::first()->level_one_percentage;
        //                         $data = ['name' => $super_duper_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
        //                         $contactEmail = $super_duper_parent_user->email;
        //                         $this->sendMail($data ,$contactEmail);
        Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
            {  
                $message->to($contactEmail)->subject('Contribution Amount!!');
            });
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
