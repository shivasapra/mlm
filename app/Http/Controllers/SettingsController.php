<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Settings;
use App\Cause;
use Session;
class SettingsController extends Controller
{
    public function settings(){
        return view('settings')->with('settings',Settings::first())
                                ->with('causes',Cause::all());
    }
    public function saveBasic(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        if($request->level_one_percentage == 0){
            $settings->level_one_percentage = 0;
            $settings->level_one_percentage_standard = 0;
            $settings->level_one_percentage_premium = 0;
        }
        else{
            $settings->level_one_percentage = $request->level_one_percentage;
        }
        
        $settings->level_two_percentage = $request->level_two_percentage;
        $settings->level_three_percentage = $request->level_three_percentage;
        $settings->admin_amount = $request->admin_amount;
        $settings->basic_amount = $request->basic_amount;
        $settings->upgrade_wallet_amount = $request->upgrade_wallet_amount;
        $settings->save();
        Session::flash('success','Saved!!');
        return redirect()->back();
    }
    public function saveStandard(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        if($request->level_one_percentage_standard == 0){
            $settings->level_one_percentage = 0;
            $settings->level_one_percentage_standard = 0;
            $settings->level_one_percentage_premium = 0;
        }
        else{
            $settings->level_one_percentage_standard = $request->level_one_percentage_standard;
        }
        $settings->level_one_percentage_standard = $request->level_one_percentage_standard;
        $settings->level_two_percentage_standard = $request->level_two_percentage_standard;
        $settings->level_three_percentage_standard = $request->level_three_percentage_standard;
        $settings->admin_amount_standard = $request->admin_amount_standard;
        $settings->standard_amount = $request->standard_amount;
        $settings->upgrade_wallet_amount_standard = $request->upgrade_wallet_amount_standard;
        $settings->save();
        Session::flash('success','Saved!!');
        return redirect()->back();
    }
    public function savePremium(Request $request){
        if(!$settings = Settings::first()){
            $settings = new Settings;
        }
        if($request->level_one_percentage_premium == 0){
            $settings->level_one_percentage = 0;
            $settings->level_one_percentage_standard = 0;
            $settings->level_one_percentage_premium = 0;
        }
        else{
            $settings->level_one_percentage_premium = $request->level_one_percentage_premium;
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
}