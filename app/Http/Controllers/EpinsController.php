<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Epin;
use App\EpinCategory;
use Session;
use App\Details;
use App\User;
use Auth;

class EpinsController extends Controller
{
    public function epins(){
        if(Auth::user()->admin){
            return view('epins')->with('categories',EpinCategory::all());
        }else{
            return view('epins')->with('epins',Epin::where('sent_to',Auth::id())->orWhere('tranferred_to',Auth::id())->get());
        }
    }

    public function generateEpin(Request $request,User $user){
        for ($i= 0; $i < $request->no; $i++) { 
            do {
                $new_epin = str_random();
            }
            while(Epin::where('epin', $new_epin)->first());
            $epin = new Epin;
            $epin->epin_category_id = $request->category;
            $epin->epin = $new_epin;
            $epin->save();
        }
        Session::flash('success','Epins Genereted');
        return redirect()->route('epins');
    }

    public function generateEpinCategory(Request $request,EpinCategory $category){
        $category->name = $request->category;
        $category->rate = $request->rate;
        $category->save();
        Session::flash('success','Epin Category Genereted');
        return redirect()->route('epins');
    }

    public function CategoryDetails(EpinCategory $category){
        return view('epinCategory')->with('category',$category);
    }

    public function sendEpins(Request $request){
        EpinCategory::find($request->epin_type)->epins()->where('sent_to',null)->orderBy('id','asc')
                                            ->take($request->no_of_pins)
                                            ->update(['sent_to'=>Details::where('username',$request->username)->first()->user->id]);
        Session::flash('success','Epins Sent!!');
        return redirect()->back();
    }

}
