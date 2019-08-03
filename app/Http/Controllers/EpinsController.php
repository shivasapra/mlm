<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Epin;
use App\EpinCategory;
use Session;

class EpinsController extends Controller
{
    public function epins(){
        return view('contribution.epins')->with('categories',EpinCategory::all());
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
}
