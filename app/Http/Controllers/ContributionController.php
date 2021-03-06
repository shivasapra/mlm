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
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function contribute(Request $request){
        $collection = collect();
        $epin = $this->verifyEpin($request);
        if(!$epin){
            Session::flash('warning','Wrong Epin!!');
            return redirect()->back();
        }
        $collection = donate($request->package, $request->amount, $request->a, $collection, Auth::user());

        $parent_user = $this->findParentUser();

        $coordinates = $this->setCoordinates($parent_user);

        $collection = PaiseBaato($collection, $coordinates,'', Auth::user());
        foreach($collection as $cd){
            sendMail($cd[0],$cd[1],Auth::user());
            sleep(1);
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


    private function findParentUser(){
        $parent_user = Details::where('username',Auth::user()->details->invited_by)->first()->user;
        if(count(explode(',',$parent_user->coordinates->children)) < 5){
            return $parent_user;
        }else{
            $collection = collect(explode(',',$parent_user->coordinates->children))->concat(collect(explode(',',$parent_user->coordinates->super_children)))->concat(collect(explode(',',$parent_user->coordinates->super_duper_children)));
            foreach($collection as $c){
                if(count(explode(',',User::find($c)->coordinates->children)) < 5){
                    $parent_user = User::find($c);
                    break;
                }
            }
            return $parent_user;
        }
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

    
    
    public function viewer(User $user){
        return view('contribution.viewer')->with('user',$user);
    }
    public function UsernameSearch(Request $request){
        if($request->ajax()){
            $output= "";
            $users = User::where('username','LIKE','%'.$request->search."%")->where('campaign',0)->get();
            if($users){
                    foreach ($users as $key => $user) {
                        $output.='<option onClick="UsernameAssign(this)" value="'.$user->username.'">'.$user->username.' ('.$user->name.')</option>';
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