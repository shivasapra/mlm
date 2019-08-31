<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campaign;
use App\Perk;
use App\Shipping;
use Auth;
use Session;
use App\Images;
use App\CampaignUpdates;
use Carbon\Carbon;


class CampaignController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create(User $user){
        if(Auth::user()->campaign){
            $short_url = 'http://'.str_random(7).'.com';
            return view('campaign.create')->with('user',$user)->with('short_url',$short_url);
        }else{
            Session::flash('oops','You Do Not Have Permissions To Browse Campaigns. Please Login As a Campaign User');
            Auth::logout();
            return redirect('/login');
        }
    }

    public function index(){

        // dd(Carbon::parse('2019-08-25')->between(Carbon::parse('2019-08-26'),Carbon::parse('2019-08-28')));
        if(Auth::user()->campaign){
            $user = Auth::user();
            return view('campaign.index')->with('user',$user)->with('campaigns',Campaign::where('user_id',$user->id)->paginate(3));
        }else{
            Session::flash('oops','You Do Not Have Permissions To Browse Campaigns. Please Login As a Campaign User');
            Auth::logout();
            return redirect('/login');
        }
        
    }

    // public function campaigns(){
    //     if(Auth::user()->campaign){
    //         return view('campaign.campaigns')->with('campaigns',Campaign::paginate(3));
    //     }else{
    //         Session::flash('oops','You Do Not Have Permissions To Browse Campaigns. Please Login As a Campaign User');
    //         Auth::logout();
    //         return redirect('/login');
    //     }
        
    // }

    public function store(User $user, Campaign $campaign,Request $request){
       $campaign->user_id = $user->id;
       $campaign->campaign_id = str_random(10);
       $campaign->category = $request->category;
       $campaign->title = $request->title;
       $campaign->fundraising_target = $request->fundraising_target;
       $campaign->short_url = $request->short_url;
       $campaign->currency = $request->currency;
       $campaign->description = $request->description;
       $campaign->start_date = $request->campaign_start_date;
       $campaign->end_date = $request->campaign_end_date;
       if($request->video == 'vimeo'){
           $campaign->video = $request->vimeo_value;
       }
       if($request->video == 'youtube'){
            $campaign->video = $request->youtube_value;
        }
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/campaign',$image_new_name);
        $campaign->image = 'uploads/campaign/'.$image_new_name;
        $campaign->website_url = $request->website_url;
        $campaign->twitter_url = $request->twitter_url;
        $campaign->linkedin_url = $request->linkedin_url;
        $campaign->facebook_url = $request->facebook_url;
        $campaign->save();
        Session::flash('success','Campaign Added!!!');
        return redirect()->route('my.campaign');

    }

    public function show(Campaign $campaign){
        return view('campaign.show')->with('campaign',$campaign);
    }

    public function approve(Campaign $campaign){
        $campaign->status = 1;
        $campaign->save();
        Session::flash('success','Campaign Approved!!');
        return redirect()->back();
    }

    public function pause(Campaign $campaign){
        $campaign->status = 3;
        $campaign->save();
        Session::flash('success','Campaign Paused!!');
        return redirect()->back();
    }

    public function resume(Campaign $campaign){
        $campaign->status = 1;
        $campaign->save();
        Session::flash('success','Campaign Resumed!!');
        return redirect()->back();
    }

    public function reject(Campaign $campaign){
        $campaign->status = 0;
        $campaign->save();
        Session::flash('success','Campaign Rejected!!');
        return redirect()->back();
    }

    public function edit(Campaign $campaign){
        return view('campaign.edit')->with('campaign',$campaign);
    }

    public function update(Request $request, Campaign $campaign){
       $campaign->title = $request->title;
       $campaign->fundraising_target = $request->fundraising_target;
       $campaign->description = $request->description;
       if($request->video == 'vimeo'){
           $campaign->video = $request->vimeo_value;
       }
       if($request->video == 'youtube'){
            $campaign->video = $request->youtube_value;
        }
        if($request->hasFile('image')){

            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/campaign',$image_new_name);
            $campaign->image = 'uploads/campaign/'.$image_new_name;
        }
        $campaign->start_date = $request->campaign_start_date;
        $campaign->end_date = $request->campaign_end_date;
        $campaign->website_url = $request->website_url;
        $campaign->twitter_url = $request->twitter_url;
        $campaign->linkedin_url = $request->linkedin_url;
        $campaign->facebook_url = $request->facebook_url;
        $campaign->save();
        Session::flash('success','Campaign Updated!!!');
        return redirect()->back()->with('campaign',$campaign);
    }

    public function addPerk(Campaign $campaign){
        return view('campaign.addPerk')->with('campaign',$campaign);
    }

    public function storePerk(Campaign $campaign,Perk $perk, Request $request){
        $perk->campaign_id = $campaign->id;
        $perk->type = $request->type;
        $perk->name = $request->name;
        $perk->description = $request->description;
        $perk->currency = $request->currency;
        $perk->amount = $request->amount;
        $perk->number_available = $request->number_available;
        $perk->delivery_date = $request->delivery_date;
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/perk',$image_new_name);
        $perk->image = 'uploads/perk/'.$image_new_name;
        $perk->save();
        if ($request->shipping == 'on') {
            foreach ($request->shipping_address as $index => $s) {
                $shipping = new Shipping;
                $shipping->perk_id = $perk->id;
                $shipping->shipping_address = $request->shipping_address[$index];
                $shipping->currency = $request->currencyy[$index];
                $shipping->shipping_fee = $request->shipping_fee[$index];
                $shipping->save();
            }
        }
        Session::flash('success','Perk Added');
        return redirect()->route('campaign.edit',$campaign);
    }

    public function editPerk(Perk $perk){
        return view('campaign.editPerk')->with('perk',$perk);
    }

    public function updatePerk(Perk $perk, Request $request){
        
        
        $perk->name = $request->name;
        $perk->description = $request->description;
        $perk->currency = $request->currency;
        $perk->amount = $request->amount;
        $perk->number_available = $request->number_available;
        $perk->delivery_date = $request->delivery_date;
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/perk',$image_new_name);
        $perk->image = 'uploads/perk/'.$image_new_name;
        $perk->save();
        if ($request->shipping == 'on') {
            foreach ($request->shipping_address as $index => $s) {
                $shipping = new Shipping;
                $shipping->perk_id = $perk->id;
                $shipping->shipping_address = $request->shipping_address[$index];
                $shipping->currency = $request->currencyy[$index];
                $shipping->shipping_fee = $request->shipping_fee[$index];
                $shipping->save();
            }
        }
        Session::flash('success','Perk Added');
        return redirect()->back();
    }

    public function addImage(Request $request,Campaign $campaign,Images $image){
        $image->campaign_id = $campaign->id;

        $img = $request->image;
        $img_new_name = time().$img->getClientOriginalName();
        $img->move('uploads/campaign/images',$img_new_name);
        $image->image = 'uploads/campaign/images/'.$img_new_name;
        $image->status = 0;
        $image->save();

        Session::flash('success','Perk Added');
        return redirect()->back();
    }

    public function removeImage(Images $image){
        $image->delete();
        Session::flash('success','Image Removed');
        return redirect()->back();
    }

    public function submitImageForApproval(Images $image){
        $image->status = 1 ;
        $image->save();
        Session::flash('success','Image Submitted For Approval');
        return redirect()->back();
    }

    public function addUpdate(Request $request,Campaign $campaign,CampaignUpdates $update){
        $update->campaign_id = $campaign->id;
        $update->message = $request->updateMessage;
        $update->status = 0;
        $update->save();

        Session::flash('success','Perk Added');
        return redirect()->back();
    }

    public function removeUpdate(CampaignUpdates $update){
        $update->delete();
        Session::flash('success','Update Removed');
        return redirect()->back();
    }

    public function submitUpdateForApproval(CampaignUpdates $update){
        $update->status = 1 ;
        $update->save();
        Session::flash('success','Update Submitted For Approval');
        return redirect()->back();
    }
}
