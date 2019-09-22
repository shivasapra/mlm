<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commision;
use App\Dcomission;
use App\Details;
use App\User;
use App\Settings;
use Auth;
use Carbon\Carbon;
use App\Donation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        foreach(User::where('admin',0)->where('campaign',0)->get() as $user){
            if($user->coordinates){
                if(collect(explode(',',$user->coordinates->children))->count() == 5){
                    if( (Carbon::parse($user->coordinates->created_at->toDateString())->diffInDays(Carbon::parse(User::find(collect(explode(',',$user->coordinates->children))->last())->coordinates->created_at->toDateString())))  <= Settings::first()->reward_condition ){
                        $user->coordinates->eligible_for_reward = 1;
                        $user->coordinates->save();
                    }
                }

                if($user->coordinates->eligible_for_reward){
                    if(collect(explode(',',$user->coordinates->children))->count() == 5 and  count( array_intersect( Donation::where('package','STANDARD')->pluck('user_id')->toArray(), explode(',',$user->coordinates->children) )) == 5 ){
                        $user->coordinates->reward_one_achieved = 1;
                    }
                    if(collect(explode(',',$user->coordinates->super_children))->count() == 25 and  count( array_intersect( Donation::where('package','STANDARD')->pluck('user_id')->toArray(), explode(',',$user->coordinates->super_children) )) == 25 ){
                        $user->coordinates->reward_two_achieved = 1;
                    }
                    if(collect(explode(',',$user->coordinates->super_duper_children))->count() == 125 and  count( array_intersect( Donation::where('package','STANDARD')->pluck('user_id')->toArray(), explode(',',$user->coordinates->super_duper_children) )) == 125 ){
                        $user->coordinates->reward_three_achieved = 1;
                    }
                    $user->coordinates->save();
                }

                $collection = collect();
                $check_amount = $user->UpgradeWallet->pluck('amount')->sum() - $user->donations->pluck('amount')->sum() + $user->donations->where('package','BASIC')->first()->amount;
                if($check_amount >= Settings::first()->upgrade_to_standard){
                    if($check_amount < Settings::first()->upgrade_to_premium){
                        if($user->donations->pluck('package')->contains('BASIC')){
                            if(!$user->donations->pluck('package')->contains('STANDARD')){
                                $collection = donate('STANDARD', Settings::first()->upgrade_to_standard, '_standard' , $collection, $user);
                                $collection = PaiseBaato($collection, $user->coordinates,'_standard', $user);

                                foreach($collection as $cd){
                                    sendMail($cd[0],$cd[1],$user);
                                    sleep(1);
                                }
                            }
                        }
                    }
                }

                if($check_amount >= Settings::first()->upgrade_to_premium){
                    if($user->donations->pluck('package')->contains('BASIC')){
                        if($user->donations->pluck('package')->contains('STANDARD')){
                            if(!$user->donations->pluck('package')->contains('Premium')){
                                $collection = donate('Premium', Settings::first()->upgrade_to_premium, '_premium' , $collection, $user);
                                $collection = PaiseBaato($collection, $user->coordinates,'_premium', $user);

                                foreach($collection as $cd){
                                    sendMail($cd[0],$cd[1],$user);
                                    sleep(1);
                                }
                            }
                        }
                    }
                }

            }
        }

        foreach(Dcomission::all() as $d){
            if(Details::where('invited_by',$d->user->username)->count() >= 5){
                $c = new Commision;
                $c->user_id = $d->user_id;
                $c->amount = $d->amount;
                $c->ac = 0;
                $c->created_at = $d->created_at;
                $c->save();
                $d->delete();
            }
        }
        return view('home');
    }

    public function rewards(){
        return view('rewards');
    }

    public function users(){
        $users = User::where('admin',0)->get();
        $active_users = collect();
        foreach($users as $user){
            if($user->coordinates and !$user->campaign){
                $active_users->push($user);
            }
        }
        session(['active_users' => $active_users]);

        $inactive_users = collect();
        foreach($users as $user){
            if(!$user->coordinates and !$user->campaign){
                $inactive_users->push($user);
            }
        }
        session(['inactive_users' => $inactive_users]);

        $campaign_users = collect();
        foreach($users as $user){
            if($user->campaign){
                $campaign_users->push($user);
            }
        }
        session(['campaign_users' => $campaign_users]);

        return view('users');
    }

    public function bankReport(){
        return view('bankReport');
    }

    public function foo(Request $request){
        $coll = dd($request->foo);
        return $coll;
    }

    public function transactionHistory(){
        return view('transactionHistory');
    }
}
