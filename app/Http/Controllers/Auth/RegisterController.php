<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['unique:details'],
            'referral_code' => ['exists:details,username']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        $detail = new Details;
        $detail->user_id = $user->id;
        $detail->username = $data['username'];
        $detail->cause = $data['cause'];
        $detail->full_name = $data['name'];
        $detail->country = $data['country'];
        $detail->city = $data['city'];
        $detail->mobile = $data['mobile'];
        $detail->invited_by = $data['referral_code'];
        $detail->invited_by_email = Details::where('username',$detail->invited_by)->first()->user->email;
        $detail->promotional_url = 'http://galaxycrowd.com/'.$data['username'];
        $detail->security_pin = mt_rand(1000000, 9999999);
        $detail->save();

        $data = ['user' => Auth::user(), 'security_pin'=> $detail->security_pin];
        $contactEmail = $user->email;
        Mail::send('emails.registered', $data, function($message) use ($contactEmail)
        {  
            $message->to($contactEmail)->subject('Registered!!');
        });

        return $user;
    }
}
