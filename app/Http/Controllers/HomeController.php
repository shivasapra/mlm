<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commision; 
use App\User;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {       
        if(!Auth::user()->admin){
            if(Auth::user()->coordinates)
            {   
                if(collect(explode(',',Auth::user()->coordinates->children))->count() == 5){
                    $test = Carbon::parse(Auth::user()->coordinates->created_at->toDateString())
                                                ->diffInDays(Carbon::parse(User::find(collect(explode(',',Auth::user()->coordinates->children))->last())->coordinates->created_at->toDateString()));
                    dd($test <= 7);
                }
            }
        }
        return view('home');
    }
}
