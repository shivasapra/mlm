<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\Campaign;
use GuzzleHttp\Client;
use App\CampaignContributions;
class PaymentController extends Controller
{
    public function payment(Request $request, Campaign $campaign, CampaignContributions $cc){
        do{
            $order_id = str_random(16);
        }while(CampaignContributions::where('order_id',$order_id)->first());
        $cc->campaign_id = $campaign->id;
        $cc->order_id = $order_id;
        $cc->amount = $request->amount;
        $cc->currency = $request->currency;
        $cc->name = $request->name;
        $cc->email = $request->email;
        $cc->country = $request->country;
        $cc->state = $request->state;
        $cc->city = $request->city;
        $cc->district = $request->district;
        $cc->postal_code = $request->postal_code;
        $cc->mobile = $request->mobile;
        $cc->comment = $request->comment;
        $cc->save();

        
        $appId = '7806daab5f686610960e46446087';
        $secretKey = "6d090274d2af32356d1846af7364119ef614f9ff";
        $postData = array(
            "appId" => $appId,
            "secretKey" => $secretKey,
            "orderId" => $cc->order_id,
            "orderAmount" => $cc->amount,
            "orderCurrency" => $cc->currency,
            "orderNote" => $cc->comment,
            "customerName" => $cc->name,
            "customerPhone" => $cc->mobile,
            "customerEmail" => $cc->email,
            "returnUrl" => 'https://galaxycrowd.com/app/galaxycrowd/public/response',
            "notifyUrl" => null,
        );


        
        return view('request')->with($postData);
        
    }
}
