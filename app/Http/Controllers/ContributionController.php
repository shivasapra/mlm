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
use App\Commision;

class ContributionController extends Controller
{
    public function packages(User $user){
        return view('contribution.packages')->with('user',$user)->with('packages',ContributionPackages::all());
    }

    public function donations(User $user){
        return view('contribution.donations')->with('user',$user);
    }

    public function contribute(Request $request, Donation $donation){
        
        $epin = $this->verifyEpin($request);
        $d = $this->donate($request, $donation);
        

        if(!Auth::user()->admin and Auth::user()->coordinates == null){
            $parent_user = $this->findParentUser();
            $coordinates = $this->setCoordinates($parent_user);
        }

        
        
        return redirect()->back();
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

        return $epin;
    }

    private function donate($request, $donation){
        $donation->user_id = Auth::user()->id;
        $donation->package = $request->package;
        $donation->amount = $request->amount;
        $donation->save();
        
        $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> Settings::first()->admin_amount];
        $contactEmail = User::where('admin',1)->first()->email;
        $this->sendMail($data ,$contactEmail);
        $this->commission(Settings::first()->admin_amount,User::where('admin',1)->first());

        return $donation;
    }

    private function findParentUser(){
        $temp = Details::where('username',Auth::user()->details->invited_by)->first()->user;
        if(count(explode(',',$temp->coordinates->children)) < 5){
            $parent_user = $temp;
        }else{
            $collection = collect(explode(',',$temp->coordinates->children))->concat(collect(explode(',',$temp->coordinates->super_children)))->concat(collect(explode(',',$temp->coordinates->super_duper_children)));
            foreach($collection as $c){
                if(count(explode(',',User::find($c)->coordinates->children)) < 5){
                    $parent_user = User::find($c);
                    break;
                }
            }
        }
        return $parent_user;
    }
    
    private function commission($amount,$user){
        $commission = new Commision;
        $commission->user_id = $user->id;
        $commission->amount = $amount;
        $commission->from = Auth::id();
        $commission->save();
    }

    private function setCoordinates($parent_user){
        $coordinates = new Coordinates;
        $coordinates->user_id = Auth::user()->id;
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
        $parent_amount = Settings::first()->level_three_percentage;

        $data = ['name' => $parent_user->name, 'user' => Auth::user(), 'amount'=> $parent_amount];
        $contactEmail = $parent_user->email;
        $this->sendMail($data ,$contactEmail);
        $this->commission($parent_amount,$parent_user);
        

        if($super_parent_user = User::find($parent_user->coordinates->parent)){
            $coordinates->super_parent = $super_parent_user->id;
            $super_parent_user->coordinates->super_children = ($super_parent_user->coordinates->super_children == null) ? Auth::user()->id : $super_parent_user->coordinates->super_children.','.Auth::user()->id;
            $super_parent_user->coordinates->save();
            $super_parent_amount = Settings::first()->level_two_percentage;
            $data = ['name' => $super_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
            $contactEmail = $super_parent_user->email;
            $this->sendMail($data ,$contactEmail);
            $this->commission($super_parent_amount,$super_parent_user);

            if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                $coordinates->super_duper_parent = $super_duper_parent_user->id;
                $super_duper_parent_user->coordinates->super_duper_children = ($super_duper_parent_user->coordinates->super_duper_children == null) ? Auth::user()->id : $super_duper_parent_user->coordinates->super_duper_children.','.Auth::user()->id;
                $super_duper_parent_user->coordinates->save();

                $super_duper_parent_amount = Settings::first()->level_one_percentage;
                $data = ['name' => $super_duper_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
                $contactEmail = $super_duper_parent_user->email;
                $this->sendMail($data ,$contactEmail);
                $this->commission($super_duper_parent_amount,$super_duper_parent_user);
            }
        }
        $coordinates->save();

        return $coordinates;
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
        Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
            {  
                $message->to($contactEmail)->subject('Contribution Amount!!');
            });

        $data = ['user'=>Auth::user()];
        Mail::send('emails.thankYou', $data, function($message) use ($contactEmail)
            {  
                $message->to(Auth::user()->email)->subject('Thankyou')->from($contactEmail);
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
