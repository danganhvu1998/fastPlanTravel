<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristSpots;
use Illuminate\Support\Facades\Auth;
use App\spotInfos;

class adminTouristSpotInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkAdmin']);
    }


    public function addSpotInformationSite($spot_id){
        $spot = touristSpots::where("id", $spot_id)->first();
        $data = array(
            "spot" => $spot,
        );
        #return $data;   
        return view("admin.spotInfo.SpotInfoAdd")->with($data);
    }

    public function addSpotInformation(request $request){
        $request->validate([
            'name' => 'required',
            'about' => 'required',
            'spot_id' => 'required',
        ]);
        $spotInfo = spotInfos::where("spot_id", $request->spot_id)
            ->where("language", $request->language)
            ->first();
        if($spotInfo!=NULL){
            return back()->withErrors("Exited. Try to edit instead");
        }
        $spotInfo = new spotInfos;
        $spotInfo->spot_id = $request->spot_id;
        $spotInfo->name = $request->name;
        $spotInfo->language = $request->language;
        $spotInfo->about = $request->about;
        $spotInfo->what_to_expect = $request->what_to_expect;
        $spotInfo->activity_infomation = $request->activity_infomation;
        $spotInfo->insider_tip = $request->insider_tip;
        $spotInfo->how_to_use = $request->how_to_use;
        $spotInfo->how_to_get_there = $request->how_to_get_there;
        $spotInfo->cancellation = $request->cancellation;
        if($spotInfo->save()){
            return back()->with("message", "Success");
        }
        return back()->withErrors("Not yet saved. Something wrong");
    }

    public function spotInfoShow($spot_id, $language){
        $spotInfo = spotInfos::where("spot_id", $spot_id)
            ->where("language", $language)
            ->first();
        $data = array(
            "spotInfo" => $spotInfo,
        );
        return view("admin.spotInfo.spotInfoShow")->with($data);
        return $spotInfo;
    }

    public function spotInfoEdit(request $request){
        spotInfos::where("id", $request->spot_info_id)
            ->update([
                "name" => $request->name,
                "language" => $request->language,
                "about" => $request->about,
                "what_to_expect" => $request->what_to_expect,
                "activity_infomation" => $request->activity_infomation,
                "insider_tip" => $request->insider_tip,
                "how_to_use" => $request->how_to_use,
                "how_to_get_there" => $request->how_to_get_there,
                "cancellation" => $request->cancellation,
            ]);
        return back()->with("message", "Success");
    }
}
