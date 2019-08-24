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
use App\UpgradeWallet;
class ContributionController extends Controller
{   

    public function contribute(Request $request, Donation $donation){
        $collection = collect();
        $epin = $this->verifyEpin($request);
        if(!$epin){
            Session::flash('warning','Wrong Epin!!');
            return redirect()->back();
        }
        $this->donate($request, $donation, $collection);
        if($request->package == 'BASIC'){
            $this->BasicContribution($collection);
        }else{
            $this->OtherContribution($collection,$request);
        }
        foreach($collection as $cd){
            $this->sendMail($cd[0],$cd[1]);
        }
        return redirect()->back();
    }

    private function verifyEpin($request){
        $epin = Epin::where('epin',$request->epin)->first();
        if(!$epin or $epin->used_by != null){
            return false;
        }elseif($epin->transfers->count() and Transfer::where('epin_id',$epin->id)->orderBy('id','desc')->first()->to != Auth::id()){
            return false;
        }
        $epin->used_by = Auth::user()->id;
        $epin->used_at = Carbon::now();
        $epin->save();
        return $epin;
    }

    private function donate($request, $donation, $collection){
        $donation->user_id = Auth::user()->id;
        $donation->package = $request->package;
        $donation->amount = $request->amount;
        $donation->save();
        
        $temp = 'admin_amount'.$request->a;
        $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> Settings::first()->$temp];
        $contactEmail = User::where('admin',1)->first()->email;
        $collection->push([$data,$contactEmail]);
        $this->commission(Settings::first()->$temp,User::where('admin',1)->first(),1);
        return $donation;
    }
    
    private function commission($amount,$user,$ac){
        $commission = new Commision;
        $commission->user_id = $user->id;
        $commission->amount = $amount;
        $commission->from = Auth::id();
        $commission->ac = $ac;
        $commission->save();
    }

    private function upgradeWalletAmount($amount,$id){
        $upgrade_wallet = new UpgradeWallet;
        $upgrade_wallet->user_id = $id;
        $upgrade_wallet->amount = $amount;
        $upgrade_wallet->save(); 
    }

    private function BasicContribution($collection){
        $parent_user = $this->findParentUser($collection);
        $this->setCoordinates($parent_user, $collection);
    }

    private function OtherContribution($collection,$request){
        $parent_user = User::find(Auth::user()->coordinates->parent);
        $temp = 'level_three_percentage'.$request->a;
        $parent_amount = Settings::first()->$temp;
        $this->commission($parent_amount,$parent_user,0);

        $data = ['name' => $parent_user->name, 'user' => Auth::user(), 'amount'=> $parent_amount];
        $contactEmail = $parent_user->email;
        $collection->push([$data,$contactEmail]);

        if($super_parent_user = User::find($parent_user->coordinates->parent)){
            $temp = 'level_two_percentage'.$request->a;
            $super_parent_amount = Settings::first()->$temp;
            $this->commission($super_parent_amount,$super_parent_user,0);

            $data = ['name' => $super_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
            $contactEmail = $super_parent_user->email;
            $collection->push([$data,$contactEmail]);

            if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                $temp = 'level_one_percentage'.$request->a;
                $super_duper_parent_amount = Settings::first()->$temp;
                $this->commission($super_duper_parent_amount,$super_duper_parent_user,0);
                
                $foo = 'upgrade_wallet_amount'.$request->a;
                $this->upgradeWalletAmount(Settings::first()->$foo,$super_duper_parent_user->id);
                
                $data = ['name' => $super_duper_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
                $contactEmail = $super_duper_parent_user->email;
                $collection->push([$data,$contactEmail]);
            }else{
                $temp = 'level_one_percentage'.$request->a;
                $super_duper_parent_amount = Settings::first()->$temp;
                $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
                $contactEmail = User::where('admin',1)->first()->email;
                $collection->push([$data,$contactEmail]);
                $this->commission($super_duper_parent_amount,User::where('admin',1)->first(),0);

                $foo = 'upgrade_wallet_amount'.$request->a;
                $this->upgradeWalletAmount(Settings::first()->$foo,User::where('admin',1)->first()->id);
            }
        }else{
            $temp = 'level_two_percentage'.$request->a;
            $super_parent_amount = Settings::first()->$temp;
            $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
            $contactEmail = User::where('admin',1)->first()->email;
            $collection->push([$data,$contactEmail]);
            $this->commission($super_parent_amount,User::where('admin',1)->first(),0);

            $temp = 'level_one_percentage'.$request->a;
            $super_duper_parent_amount = Settings::first()->$temp;
            $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
            $contactEmail = User::where('admin',1)->first()->email;
            $collection->push([$data,$contactEmail]);
            $this->commission($super_duper_parent_amount,User::where('admin',1)->first(),0);
            $foo = 'upgrade_wallet_amount'.$request->a;
            $this->upgradeWalletAmount(Settings::first()->$foo,User::where('admin',1)->first()->id);
        }
    }

    private function findParentUser($collection){
        $temp = Details::where('username',Auth::user()->details->invited_by)->first()->user;

            $parent_amount = Settings::first()->level_three_percentage;
            $data = ['name' => $temp->name, 'user' => Auth::user(), 'amount'=> $parent_amount];
            $contactEmail = $temp->email;
            $collection->push([$data,$contactEmail]);
            $this->commission($parent_amount,$temp,0);

        if($super_parent_user = User::find($temp->coordinates->parent)){
            $super_parent_amount = Settings::first()->level_two_percentage;
            $data = ['name' => $super_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
            $contactEmail = $super_parent_user->email;
            $collection->push([$data,$contactEmail]);
            $this->commission($super_parent_amount,$super_parent_user,0);

            if($super_duper_parent_user = User::find($super_parent_user->coordinates->parent)){
                $super_duper_parent_amount = Settings::first()->level_one_percentage;
                $data = ['name' => $super_duper_parent_user->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
                $contactEmail = $super_duper_parent_user->email;
                $collection->push([$data,$contactEmail]);
                $this->commission($super_duper_parent_amount,$super_duper_parent_user,0);
                $this->upgradeWalletAmount(Settings::first()->upgrade_wallet_amount,$super_duper_parent_user->id);
                
            }else{
                $super_duper_parent_amount = Settings::first()->level_one_percentage;
                $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
                $contactEmail = User::where('admin',1)->first()->email;
                $collection->push([$data,$contactEmail]);
                $this->commission($super_duper_parent_amount,User::where('admin',1)->first(),0);
                $this->upgradeWalletAmount(Settings::first()->upgrade_wallet_amount,User::where('admin',1)->first()->id);
            }
        }else{
            $super_parent_amount = Settings::first()->level_two_percentage;
            $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> $super_parent_amount];
            $contactEmail = User::where('admin',1)->first()->email;
            $collection->push([$data,$contactEmail]);
            $this->commission($super_parent_amount,User::where('admin',1)->first(),0);

            $super_duper_parent_amount = Settings::first()->level_one_percentage;
            $data = ['name' => User::where('admin',1)->first()->name, 'user' => Auth::user(), 'amount'=> $super_duper_parent_amount];
            $contactEmail = User::where('admin',1)->first()->email;
            $collection->push([$data,$contactEmail]);
            $this->commission($super_duper_parent_amount,User::where('admin',1)->first(),0);
            $this->upgradeWalletAmount(Settings::first()->upgrade_wallet_amount,User::where('admin',1)->first()->id);
        }


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

    
    private function setCoordinates($parent_user, $collection){
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
        return $coordinates;
    }

    private function sendMail($data, $contactEmail){
        try{
                Mail::send('emails.contribution', $data, function($message) use ($contactEmail)
                    {  
                        $message->to($contactEmail)->subject('Contribution Amount!!');
                    });
                $data = ['user'=>Auth::user()];
                Mail::send('emails.thankYou', $data, function($message) use ($contactEmail)
                    {  
                        $message->to(Auth::user()->email)->subject('Thankyou');
                    });

        }catch (exception $e) {
            Session::flash('oops','Donation Successfull!! But Unable to Send Mail! Please Contact Support');
        }
    }
    
    
    public function viewer(User $user){
        return view('contribution.viewer')->with('user',$user);
    }
    public function UsernameSearch(Request $request){
        if($request->ajax()){
            $output= "";
            $users = User::where('username','LIKE','%'.$request->search."%")->where('campaign',0)->get();
            if($users){
                    foreach ($users as $key => $user) {
                        $output.='<option onClick="UsernameAssign(this)" value="'.$user->username.'">'.$user->username.'</option>';
                    }
                return Response($output);
            }
        }
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

    // public function packages(User $user){
    //     return view('contribution.packages')->with('user',$user)->with('packages',ContributionPackages::all());
    // }
    // public function donations(User $user){
    //     return view('contribution.donations')->with('user',$user);
    // }
    // private function findChildren($id){
    //     $children = array();
    //     foreach(collect(explode(',',User::find($id)->coordinates->children)) as $child){
    //         array_push($children,User::find($child)->name);
    //     }
    //     return $children;
    // }
}