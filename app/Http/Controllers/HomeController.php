<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commision; 
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
                    if( (Carbon::parse($user->coordinates->created_at->toDateString())->diffInDays(Carbon::parse(User::find(collect(explode(',',$user->coordinates->children))->last())->coordinates->created_at->toDateString())))  <=7 ){
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
                if($user->UpgradeWallet->pluck('amount')->sum() >= Settings::first()->upgrade_to_standard){
                    if($user->UpgradeWallet->pluck('amount')->sum() < Settings::first()->upgrade_to_premium){
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

                if($user->UpgradeWallet->pluck('amount')->sum() >= Settings::first()->upgrade_to_premium){
                    if($user->donations->pluck('package')->contains('BASIC')){
                        if($user->donations->pluck('package')->contains('STANDARD')){
                            if(!$user->donations->pluck('package')->contains('Premium')){
                                $collection = donate('Premium', Settings::first()->upgrade_to_standard, '_premium' , $collection, $user);
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
        return view('home');
    }

    public function rewards(){
        return view('rewards');
    }

    public function users(){
        return view('users')->with('users',User::where('admin',0)->get());
    }
}
