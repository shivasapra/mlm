<?php
use App\Http\Controllers\UserController;
use App\EpinRequests;
use App\Epin;
use Illuminate\Http\Request;
use App\EpinCategory;
use App\purchaseEpin;
use App\Campaign;
use Illuminate\Support\Facades\Session;
use App\Details;
use Illuminate\Support\Facades\Auth;
use App\Coordinates;
use App\Http\Controllers\ContributionController;
use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test',function(){
    $total = ((Auth::user()->coordinates->children != null)? count(explode(',',Auth::user()->coordinates->children)): 0)  + ((Auth::user()->coordinates->super_children != null)? count(explode(',',Auth::user()->coordinates->super_children)): 0) + ((Auth::user()->coordinates->super_duper_children != null)? count(explode(',',Auth::user()->coordinates->super_duper_children)) : 0);
    $total_two = Coordinates::where('parent',Auth::id())->orWhere('super_parent',Auth::id())->orWhere('super_duper_parent',Auth::id())->pluck('user_id');
    dd($total, $total_two);
});


Route::get('/get-refree/{code}',function($code){
    // return $code;
    return json_encode(App\User::select('name')->where('username',$code)->get());
});


Auth::routes();

Route::get('/campaign/register',function(){
    Auth::logout();
    return view('auth.campaignRegister');
});

Route::get('/campaign',function(){
    Auth::logout();
    return redirect('/campaign/register');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/account-settings/{user}', 'UserController@accountSettings')->name('account.settings');
Route::post('/update-profile/{user}', 'UserController@updateProfile')->name('update.profile');
Route::post('/update-password/{user}', 'UserController@updatePassword')->name('update.password');
Route::post('/update-email/{user}', 'UserController@updateEmail')->name('update.email');
Route::post('/update-mobile/{user}', 'UserController@updateMobile')->name('update.mobile');
Route::post('/update-pin/{user}', 'UserController@updatePin')->name('update.pin');
Route::get('/KYC/{user}', 'UserController@KYC')->name('KYC');
Route::get('/View-KYC', 'UserController@viewKYC')->name('view.KYC');

Route::get('/approveKYC/{k}', 'UserController@approveKYC')->name('approve.kyc');

Route::get('/assignment-settings/{user}', 'AssignmentController@index')->name('assignment.settings');
Route::post('/update-BankTransfer/{user}', 'AssignmentController@updateBankTransfer')->name('update.bankTransfer');
Route::post('/update-Paypal/{user}', 'AssignmentController@updatePaypal')->name('update.paypal');
Route::post('/update-PerfectMoney/{user}', 'AssignmentController@updatePerfectMoney')->name('update.perfectMoney');
Route::post('/update-payza/{user}', 'AssignmentController@updatePayza')->name('update.payza');
Route::post('/update-skrill/{user}', 'AssignmentController@updateSkrill')->name('update.skrill');
Route::post('/update-bkash/{user}', 'AssignmentController@updateBkash')->name('update.bkash');
Route::post('/update-solidTrust/{user}', 'AssignmentController@updateSolidTrust')->name('update.solidTrust');

Route::post('/identity-proof/upload/{user}','UserController@identityProof')->name('identity.proof.upload');
Route::post('/address-proof/upload/{user}','UserController@addressProof')->name('address.proof.upload');
Route::post('/tax-proof/upload/{user}','UserController@taxProof')->name('tax.proof.upload');

Route::get('/add-campaign/{user}','CampaignController@create')->name('add.campaign');
Route::get('/MyCampaign','CampaignController@index')->name('my.campaign');
Route::post('/Campaign/Store/{user}','CampaignController@store')->name('campaign.store');

Route::get('/Campaign/view/{campaign}',function(Campaign $campaign){
    return view('campaign.show')->with('campaign',$campaign);
})->name('campaign.view');

Route::get('/Campaign/contribute/{campaign}',function(Campaign $campaign){
    return view('campaign.contribute')->with('campaign',$campaign);
})->name('campaign.contribute');

Route::post('/payment/{campaign}','PaymentController@payment')->name('payment');
Route::post('/response',function(){
    return view('response');
})->name('response');


Route::get('/Campaign/approve/{campaign}','CampaignController@approve')->name('campaign.approve');
Route::get('/Campaign/pause/{campaign}','CampaignController@pause')->name('campaign.pause');
Route::get('/Campaign/resume/{campaign}','CampaignController@resume')->name('campaign.resume');
Route::get('/Campaign/reject/{campaign}','CampaignController@reject')->name('campaign.reject');
Route::get('/Campaign/edit/{campaign}','CampaignController@edit')->name('campaign.edit');
Route::post('/Campaign/update/{campaign}','CampaignController@update')->name('campaign.update');
Route::get('/Campaign/adminList',function(){
    return view('campaign.adminList');
})->name('campaigns.adminList');

Route::get('/Campaigns',function(){
    return view('campaign.campaigns')->with('campaigns',App\Campaign::paginate(12));
})->name('campaigns');

Route::get('/add-perk/{campaign}','CampaignController@addPerk')->name('add.perk');
Route::post('/store-perk/{campaign}','CampaignController@storePerk')->name('perk.store');
Route::get('/edit-perk/{perk}','CampaignController@editPerk')->name('perk.edit');
Route::post('/update-perk/{perk}','CampaignController@updatePerk')->name('perk.update');

Route::post('/add-image/{campaign}','CampaignController@addImage')->name('add.image');
Route::get('/remove-image/{image}','CampaignController@removeImage')->name('remove.image');
Route::get('/submit-image-for-approval/{image}','CampaignController@submitImageForApproval')->name('submit.image.for.approval');

Route::post('/add-update/{campaign}','CampaignController@addUpdate')->name('add.update');
Route::get('/remove-update/{update}','CampaignController@removeUpdate')->name('remove.update');
Route::get('/submit-update-for-approval/{update}','CampaignController@submitUpdateForApproval')->name('submit.update.for.approval');

Route::get('/contribution-packages/{user}','ContributionController@packages')->name('contribution.packages');
Route::get('/contribution-donations/{user}','ContributionController@donations')->name('contribution.donations');

Route::post('/contribute/','ContributionController@contribute')->name('contribute');

Route::get('/Settings','SettingsController@settings')->name('settings');
Route::post('/Save-Basic-Settings','SettingsController@saveBasic')->name('settings.saveBasic');
Route::post('/Save-Standard-Settings','SettingsController@saveStandard')->name('settings.saveStandard');
Route::post('/Save-Premium-Settings','SettingsController@savePremium')->name('settings.savePremium');
Route::post('/Save-Facilitation','SettingsController@saveFacilitation')->name('settings.saveFacilitation');
Route::post('/Save-Reward-Condition','SettingsController@saveRewardCondition')->name('settings.saveRewardCondition');
Route::post('/Save-Rewards','SettingsController@saveRewards')->name('settings.saveRewards');

Route::post('/withdraw','EpinsController@withdraw')->name('withdraw');

Route::get('/Cause-Delete/{id}','SettingsController@CauseDelete')->name('cause.delete');
Route::post('/save-cause','SettingsController@CauseSave')->name('save.cause');
Route::post('/save-subcause','SettingsController@SubCauseSave')->name('save.subcause');


Route::get('/epins','EpinsController@epins')->name('epins');
Route::get('/epin-requests','EpinsController@epinRequests')->name('epin.requests');
Route::post('/generate-epin','EpinsController@generateEpin')->name('generate.epin');
Route::post('/generate-epin-category','EpinsController@generateEpinCategory')->name('generate.epinCategory');
Route::get('/Epin-Category-Details/{category}','EpinsController@CategoryDetails')->name('category.details');
Route::post('/Send Epins','EpinsController@sendEpins')->name('epins.send');
Route::post('/Transfer-Epin','EpinsController@transferEpins')->name('transfer.epin');
Route::get('/revert-epin/{epin}','EpinsController@revert')->name('revert.epin');

Route::get('/user-epins','EpinsController@userEpins')->name('user.epins');

Route::get('/contribution-viewer/{user}','ContributionController@viewer')->name('contribution.viewer');

Route::get('/searchUsername','ContributionController@UsernameSearch');

// Route::get('/{username}',function(){
//     return view('userProfile');
// })->name('user.profile');

Route::get('/wallets','EpinsController@wallets')->name('wallets');
Route::get('/admin-wallets','EpinsController@adminWallets')->name('admin.wallets');

Route::get('/bank-report','HomeController@bankReport')->name('bank.report');
Route::get('/support-create-tickets','UserController@supportCreateTickets')->name('support.createTickets');
Route::get('/support-view-tickets','UserController@supportViewTickets')->name('support.viewTickets');
Route::post('/store-ticket','UserController@storeTicket')->name('store.ticket');
Route::get('/tickets','UserController@tickets')->name('admin.ticket');
Route::get('/approve-ticket/{t}','UserController@approveTicket')->name('approve.ticket');

Route::get('/rewards','HomeController@rewards')->name('rewards');
Route::get('/users','HomeController@users')->name('users');



Route::get('/verify-email/{verify_token}',function($verify_token){
    Auth::logout();
    $detail = Details::where('verify_token',$verify_token)->firstOrFail();
    $detail->email_verification = 1;
    $detail->verify_token = null;
    $detail->save();
    \Session::flash('oops','Email Verified. Please Login!!');
    return redirect()->route('home');
})->name('verify.email');


Route::get('/resend-verification',function(){
    Auth::user()->details->verify_token = null;
    Auth::user()->details->save();

    do{
        $verify_token = str_random();
    }while(App\Details::where('verify_token',$verify_token)->first());
    Auth::user()->details->verify_token = $verify_token;
    Auth::user()->details->save();

    $contactEmail = Auth::user()->email;
    $data = ['user' => Auth::user(), 'security_pin'=> Auth::user()->details->security_pin, 'verify_token'=> Auth::user()->details->verify_token];
    \Mail::send('emails.registered', $data, function($message) use ($contactEmail)
    {
        $message->to($contactEmail)->subject('Registered!!');
    });
    \Session::flash('success','Verification Resent');
    return redirect()->back();
})->name('resend.verification')->middleware('auth');

Route::get('/buy',function(Request $request){
    $e = Epin::where('sent_to',Auth::id())->where('used_by',Auth::id())->first();

    for ($i=0; $i <$request->amount ; $i++) {
        $epin = new Epin;
        $epin->epin_category_id = $e->epin_category_id;
        $epin->rate = EpinCategory::find($e->epin_category_id)->rate;
        $epin->sent_to = Auth::id();
        do {
            $new_epin = str_random();
        }
        while(Epin::where('epin', $new_epin)->first());
        $epin->epin = $new_epin;
        $epin->save();

        $p = new purchaseEpin;
        $p->epin_id = $epin->id;
        $p->user_id = Auth::id();
        $p->rate = $epin->EpinCategory->rate;
        $p->save();
    }

    return $epin;
})->middleware('auth');


Route::get('/foo','HomeController@foo');

Route::get('/transaction-history','HomeController@transactionHistory')->name('transaction.history');


Route::get('/dateRange/{from}/{to}',function($from,$to){

    $active_users = collect();
    foreach(User::where('admin',0)->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->get() as $user){
        if($user->coordinates and !$user->campaign){
            $active_users->push($user);
        }
    }

    $inactive_users = collect();
    foreach(User::where('admin',0)->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->get() as $user){
        if(!$user->coordinates and !$user->campaign){
            $inactive_users->push($user);
        }
    }

    $campaign_users = collect();
    foreach(User::where('admin',0)->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->get() as $user){
        if($user->campaign){
            $campaign_users->push($user);
        }
    }


    session(['active_users' => $active_users]);
    session(['inactive_users' => $inactive_users]);
    session(['campaign_users' => $campaign_users]);


    return [$active_users, $inactive_users, $campaign_users];
});

Route::get('/nullify',function(){
    session(['active_users' => null]);
    session(['inactive_users' => null]);
    session(['campaign_users' => null]);

    return 'true';
});
