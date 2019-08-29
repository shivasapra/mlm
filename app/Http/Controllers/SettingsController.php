<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Settings;
use App\Cause;
use App\Subcause;
use Session;
class SettingsController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function settings(){
        return view('settings')->with('settings',Settings::first())
                                ->with('causes',Cause::all());
    }
    public function saveBasic(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        
        $settings->level_one_percentage = $request->level_one_percentage;
        $settings->level_two_percentage = $request->level_two_percentage;
        $settings->level_three_percentage = $request->level_three_percentage;
        $settings->admin_amount = $request->admin_amount;
        $settings->basic_amount = $request->basic_amount;
        $settings->upgrade_wallet_amount = $request->upgrade_wallet_amount;
        $settings->upgrade_to_standard = $request->upgrade_to_standard;
        $settings->save();
        Session::flash('success','Saved!!');
        return redirect()->back();
    }
    public function saveStandard(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        $settings->level_one_percentage_standard = $request->level_one_percentage_standard;
        $settings->level_two_percentage_standard = $request->level_two_percentage_standard;
        $settings->level_three_percentage_standard = $request->level_three_percentage_standard;
        $settings->admin_amount_standard = $request->admin_amount_standard;
        $settings->standard_amount = $request->standard_amount;
        $settings->upgrade_wallet_amount_standard = $request->upgrade_wallet_amount_standard;
        $settings->upgrade_to_premium = $request->upgrade_to_premium;
        $settings->save();
        Session::flash('success','Saved!!');
        return redirect()->back();
    }
    public function savePremium(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        $settings->level_one_percentage_premium = $request->level_one_percentage_premium;
        $settings->level_two_percentage_premium = $request->level_two_percentage_premium;
        $settings->level_three_percentage_premium = $request->level_three_percentage_premium;
        $settings->admin_amount_premium = $request->admin_amount_premium;
        $settings->premium_amount = $request->premium_amount;
        $settings->upgrade_wallet_amount_premium = $request->upgrade_wallet_amount_premium;
        $settings->save();
        Session::flash('success','Saved!!');
        return redirect()->back();
        
    }
    public function saveFacilitation(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        $settings->facilitation_percentage = $request->facilitation_percentage;
        $settings->save();
        Session::flash('success','Saved!!');
        return redirect()->back();
    }

    public function saveRewardCondition(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        $settings->reward_condition = $request->reward_condition;
        $settings->save();
        Session::flash('success','Saved!!');
        return redirect()->back();
    }

    public function saveRewards(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        $settings->reward_one_prize = $request->reward_one_prize;
        $settings->reward_two_prize = $request->reward_two_prize;
        $settings->reward_three_prize = $request->reward_three_prize;

        $settings->reward_one_tc = $request->reward_one_tc;
        $settings->reward_two_tc = $request->reward_two_tc;
        $settings->reward_three_tc = $request->reward_three_tc;

        $settings->save();
        
        Session::flash('success','Saved!!');
        return redirect()->back();
    }

    public function CauseDelete($id){
        $cause = Cause::find($id);
        $cause->delete();
        
        Session::flash('success','Deleted');
        return redirect()->back();
    }
    public function CauseSave(Request $request){
        $cause = new Cause;
        $cause->name = $request->cause;
        $cause->save();
        Session::flash('success','cause saved!!');
        return redirect()->back();
    }

    public function SubCauseSave(Request $request,Subcause $s){
        $s->cause_id = $request->cause;
        $s->name = $request->subcause;
        $s->save();
        Session::flash('success','SubCause Saved');
        return redirect()->back();
    }
}