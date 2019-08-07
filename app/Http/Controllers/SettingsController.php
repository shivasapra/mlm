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

    public function save(Request $request){
        if(Settings::first() == null){
            $settings = new Settings;
        }else{
            $settings = Settings::first();
        }

        $settings->level_one_percentage = $request->level_one_percentage;
        $settings->level_two_percentage = $request->level_two_percentage;
        $settings->level_three_percentage = $request->level_three_percentage;
        $settings->admin_amount = $request->admin_amount;
        $settings->basic_amount = $request->basic_amount;

        $settings->level_one_percentage_standard = $request->level_one_percentage_standard;
        $settings->level_two_percentage_standard = $request->level_two_percentage_standard;
        $settings->level_three_percentage_standard = $request->level_three_percentage_standard;
        $settings->admin_amount_standard = $request->admin_amount_standard;
        $settings->standard_amount = $request->standard_amount;
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
        
        return $cause;
    }
}
