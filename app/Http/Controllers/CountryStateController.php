<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Crossing;

class CountryStateController extends Controller
{
    

    public function getcrossing($id){
        $crossings = Crossing::where("crossing_country",$id)->get();
        return response()->json($crossings);
    }

    public function getstates($id){
        $states = State::where("country_id",$id)->get();
        return response()->json($states);
    }

    public function getcountry(){
        $countries = Country::get();
        
        return response()->json($countries);
    }

}
