<?php
use App\Http\Controllers\UserController;
use App\EpinRequests;
use App\Epin;
use Illuminate\Http\Request;

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


Route::get('/test','ContributionController@matrix');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/account-settings/{user}', 'UserController@accountSettings')->name('account.settings');
Route::post('/update-profile/{user}', 'UserController@updateProfile')->name('update.profile');
Route::post('/update-password/{user}', 'UserController@updatePassword')->name('update.password');
Route::post('/update-email/{user}', 'UserController@updateEmail')->name('update.email');
Route::post('/update-mobile/{user}', 'UserController@updateMobile')->name('update.mobile');
Route::post('/update-pin/{user}', 'UserController@updatePin')->name('update.pin');
Route::get('/KYC/{user}', 'UserController@KYC')->name('KYC');

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
Route::get('/MyCampaign/{user}','CampaignController@index')->name('my.campaign');
Route::post('/Campaign/Store/{user}','CampaignController@store')->name('campaign.store');
Route::get('/Campaign/view/{campaign}','CampaignController@show')->name('campaign.view');
Route::get('/Campaign/edit/{campaign}','CampaignController@edit')->name('campaign.edit');
Route::post('/Campaign/update/{campaign}','CampaignController@update')->name('campaign.update');

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
Route::get('/Cause-Delete/{id}','SettingsController@CauseDelete')->name('cause.delete');
Route::get('/save-cause','SettingsController@CauseSave')->name('cause.save');


Route::get('/epins','EpinsController@epins')->name('epins');
Route::get('/epin-requests','EpinsController@epinRequests')->name('epin.requests');
Route::post('/generate-epin','EpinsController@generateEpin')->name('generate.epin');
Route::post('/generate-epin-category','EpinsController@generateEpinCategory')->name('generate.epinCategory');
Route::get('/Epin-Category-Details/{category}','EpinsController@CategoryDetails')->name('category.details');
Route::post('/Send Epins','EpinsController@sendEpins')->name('epins.send');
Route::post('/Transfer-Epin','EpinsController@transferEpins')->name('transfer.epin');

Route::get('/user-epins','EpinsController@userEpins')->name('user.epins');

Route::get('/contribution-viewer/{user}','ContributionController@viewer')->name('contribution.viewer');

Route::get('/searchUsername','ContributionController@UsernameSearch');

// Route::get('/{username}',function(){
//     return view('userProfile');
// })->name('user.profile');

Route::get('/wallets','EpinsController@wallets')->name('wallets');

Route::get('/verify-email/{verify_token}','UserController@verify')->name('verify.email');

Route::get('/support-create-tickets','UserController@supportCreateTickets')->name('support.createTickets');
Route::get('/support-view-tickets','UserController@supportViewTickets')->name('support.viewTickets');
Route::post('/store-ticket','UserController@storeTicket')->name('store.ticket');

Route::get('/buy',function(Request $request){
    $e = Epin::where('sent_to',Auth::id())->where('used_by',Auth::id())->first();

    for ($i=0; $i <$request->amount ; $i++) { 
        $epin = new Epin;
        $epin->epin_category_id = $e->epin_category_id;
        $epin->sent_to = Auth::id();
        do {
            $new_epin = str_random();
        }
        while(Epin::where('epin', $new_epin)->first());
        $epin->epin = $new_epin;
        $epin->save();
    }

    return $epin;
    // return Auth::user();
});
