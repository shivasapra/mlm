<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Epin;
use App\EpinCategory;
use Session;
use App\Details;
use App\User;
use Auth;
use App\Commission;
use App\Transfer;

class EpinsController extends Controller
{
    public function epins(){
        if(Auth::user()->admin){
            return view('epins')->with('categories',EpinCategory::all());
        }else{
            $epins = Epin::where('sent_to',Auth::id())->get();
            $transferred_epins = array();
            foreach(Transfer::where('to',Auth::id())->pluck('epin_id') as $tran){
                $e = Epin::find($tran);
                array_push($transferred_epins,$e);
            }
            return view('epins')->with('epins',$epins->concat(collect($transferred_epins)));
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

    public function transferEpins(Transfer $transfer, Request $request){
        $transfer->epin_id = Epin::find($request->epin_id)->id;
        $transfer->from = Auth::id();
        $transfer->to = Details::where('username',$request->username)->first()->user->id;
        $transfer->save();
        Session::flash('success','Epin Transferred!!');
        return redirect()->back();
    }

    public function wallets(){
            $used_epins = Epin::where('sent_to',Auth::id())->where('used_by','!=',null)->get();
            $transferred_used_epins = array();
            foreach(Transfer::where('to',Auth::id())->pluck('epin_id') as $tran){
                $e = Epin::find($tran);
                if($e->used_by != null){
                    array_push($transferred_used_epins,$e);
                }
            }

            $transferred_epins = array();
            foreach(Transfer::where('from',Auth::id())->pluck('epin_id') as $tran){
                $e = Epin::find($tran);
                array_push($transferred_epins,$e);
            }

            $commissions = Auth::user()->commissions;
        return view('wallet.wallets')->with('used_epins',$used_epins->concat(collect($transferred_used_epins)))
                                        ->with('transferred_epins',$transferred_epins)
                                        ->with('commissions',$commissions);

    }

    public function epinRequests(){
        return view('epinRequests');
    }

}
