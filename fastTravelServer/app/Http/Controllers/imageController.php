<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristSpots;
use App\images;
use Illuminate\Support\Facades\Auth;

class imageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function linkImageToUpperSpot($image_id){
        $image = image::findOrFail($image_id);
        $spot = touristSpots::findOrFail($image->spot_id);
        while(1){
            $where = "level_".$spot->level."_spot_id";
            $image[$where] = $spot->id;
            if($spot->upper_spot_id==0) break;
            $spot = touristSpots::where("id", $spot->upper_spot_id) ->first();
        }
        return $image->save();
    }

    public function imageUpload($request){
        return $request;
    }
}
