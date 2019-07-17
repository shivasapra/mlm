<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campaign;

class CampaignController extends Controller
{
    public function create(User $user){
        return view('campaign.create')->with('user',$user);
    }

    public function index(User $user){
        return view('campaign.index')->with('user',$user);
    }

    public function store(User $user, Campaign $campaign,Request $request){
       $campaign->user_id = $user->id;
       $campaign->campaign_id = str_random(10);
       $campaign->category = $request->category;
       $campaign->title = $request->title;
       $campaign->fundraising_target = $request->fundraising_target;
       $campaign->short_url = $request->short_url;
       $campaign->currency = $request->currency;
       $campaign->description = $request->description;
       if($request->video == 'vimeo'){
           $campaign->video = $request->vimeo_value;
       }
       if($request->video == 'youtube'){
            $campaign->video = $request->youtube_value;
        }
        $campaign->website_url = $request->website_url;
        $campaign->twitter_url = $request->twitter_url;
        $campaign->linkedin_url = $request->linkedin_url;
        $campaign->facebook_url = $request->facebook_url;
        $campaign->save();
        Session::flash('success','Campaign Added!!!');
        return redirect()->route('my.campaign',$user);

    }
}
