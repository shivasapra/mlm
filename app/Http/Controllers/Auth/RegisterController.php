<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Cause;
use App\Epin;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorCrowdFunding(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_code' => ['exists:details,username'],
        ]);
    }

    protected function validatorCampaign(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createCrowdFunding(array $data)
    {   
        do{
            $username = 'GCF'.mt_rand(1000000, 9999999);
        }while(User::where('username',$username)->first());
        
        $user = new User;
        $user->name = $data['name'];
        $user->username = $username;
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        $detail = new Details;
        $detail->user_id = $user->id;
        $detail->username = $username;
        $detail->cause = Cause::find($data['cause'])->name;
        $detail->full_name = $data['name'];
        $detail->state = $data['state'];
        $detail->city = $data['city'];
        $detail->mobile = $data['mobile'];
        $detail->invited_by = $data['referral_code'];
        $detail->invited_by_email = Details::where('username',$detail->invited_by)->first()->user->email;
        $detail->promotional_url = 'http://galaxycrowd.com/'.$username;
        $detail->security_pin = mt_rand(1000000, 9999999);
        do{
            $verify_token = str_random();
        }while(Details::where('verify_token',$verify_token)->first());
        $detail->verify_token = $verify_token;
        $detail->save();
        // $message = urlencode("Welcome to Galaxy Crowd, " + $data['name'] + ". Your account has been created Successfully");
        // file_get_contents('http://sms.javronsolutions.com/app/smsapi/index.php?key=55D6E290CDEE3F&campaign=8231&routeid=30&type=text&contacts=' + $data['mobile'] + '&senderid=GLAXYC&msg=' + $message);
        $contactEmail = $data['email'];
        $data = ['user' => $user, 'security_pin'=> $detail->security_pin, 'verify_token'=> $detail->verify_token];
        Mail::send('emails.registered', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Registered!!');
        });
        
        return $user;
    }

    protected function createCampaign(array $data){
        do{
            $username = 'GCC'.mt_rand(1000000, 9999999);
        }while(User::where('username',$username)->first());
        
        $user = new User;
        $user->name = $data['name'];
        $user->username = $username;
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->campaign = 1;
        $user->save();

        $detail = new Details;
        $detail->user_id = $user->id;
        $detail->username = $username;
        $detail->cause = Cause::find($data['cause'])->name;
        $detail->full_name = $data['name'];
        $detail->state = $data['state'];
        $detail->city = $data['city'];
        $detail->mobile = $data['mobile'];
        $detail->promotional_url = 'http://galaxycrowd.com/'.$username;
        $detail->security_pin = mt_rand(1000000, 9999999);
        do{
            $verify_token = str_random();
        }while(Details::where('verify_token',$verify_token)->first());
        $detail->verify_token = $verify_token;
        $detail->save();
        
        $contactEmail = $data['email'];
        $data = ['user' => $user, 'security_pin'=> $detail->security_pin, 'verify_token'=> $detail->verify_token];
        Mail::send('emails.registered', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Registered!!');
        });
        
        return $user;
    }
}
