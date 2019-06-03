<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristSpots;
use Carbon\Carbon;
use App\images;
use Illuminate\Support\Facades\Auth;
use App\spotInfos;

class adminTouristSpotController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkAdmin']);
    }

    public function addTouristSpotSite(){
        return view("admin.touristSpot.touristSpotAdd");
    }

    public function addTouristSpot(request $request){
        $request->validate([
            'name' => 'required',
            "level"  => 'required',
            "about"  => 'required',
            "type"  => 'required',
            "upper_spot1_id"  => 'required',
            "upper_spot_id"  => 'required',
            "hashtag"  => 'required',
            "typical_spending_dollar"  => 'required',
        ]);
        $spot = new touristSpots;
        $spot->name = $request->name;
        $spot->level = $request->level;
        $spot->about = $request->about;
        $spot->type = $request->type;
        $spot->upper_spot1_id = $request->upper_spot1_id;
        $spot->upper_spot_id = $request->upper_spot_id;
        $spot->hashtag = $request->hashtag;
        $spot->typical_spending_dollar = $request->typical_spending_dollar;
        $spot->save();
        return $request;
    }

    public function showAllTouristSpots($page, $level_start, $level_end){
        $takeNumber = 20;
        $spots = touristSpots::whereBetween('level', [$level_start, $level_end])
            ->skip(($page-1)*$takeNumber)
            ->take($takeNumber)
            ->select("id")
            ->get();
        $spotsFullInfo = $this->touristSpotFullInfomation($spots, 2, 0, 0);
        $data = array(
            "spots" => $spotsFullInfo,
        );
        return view('admin.touristSpot.touristSpotShowAll')->with($data);
    }

    public function touristSpotImage($spot_id, $numImgNeed=3, $numSkipTimes=0){
        $level = touristSpots::where("id", $spot_id)->first()->level;
        $where = "level_".$level."_spot_id";
        $images = images::where($where, $spot_id)
            ->orderBy("trusted", "desc")
            ->orderBy("like_count", "desc")
            ->skip($numImgNeed*$numSkipTimes)
            ->take($numImgNeed)
            ->get();
        return $images;
    }

    public function touristSpotInfos($spot_id){
        $infos = spotInfos::where("spot_id", $spot_id)
            -> select("id", "language", "spot_id")
            ->get();
        return $infos;
    }

    public function touristSpotFullInfomation($spots, $numImgNeed=3, $numSkipTimes=0, $need_info=1){
        $spotsFullInfo = touristSpots::whereIn("id", $spots)->get();
        foreach ($spotsFullInfo as $spot){
            $spot->images = $this->touristSpotImage($spot->id, $numImgNeed, $numSkipTimes);
            if($need_info) $spot->infos = $this->touristSpotInfos($spot->id);
        }
        return $spotsFullInfo;
    }

    public function editTouristSpot(request $request){
        $request->validate([
            'spot_id' => 'required',
            'name' => 'required',
            "level"  => 'required',
            "about"  => 'required',
            "type"  => 'required',
            "upper_spot1_id"  => 'required',
            "upper_spot_id"  => 'required',
            "hashtag"  => 'required',
            "typical_spending_dollar"  => 'required',
        ]);
        touristSpots::where("id", $request->spot_id)
            ->update([
                "name" => $request->name,
                "level" => $request->level,
                "about" => $request->about,
                "type" => $request->type,
                "upper_spot1_id" => $request->upper_spot1_id,
                "upper_spot_id" => $request->upper_spot_id,
                "hashtag" => $request->hashtag,
                "typical_spending_dollar" => $request->typical_spending_dollar,
            ]);
        return back()->with("message", "Success");
    }

    public function uploadImageToSpot(request $request){
        $request->validate([
            'image' => 'max:1999|image|required  ',
        ]);
        // Filename to store
        $fileNameToStore = Carbon::now()->timestamp."-".random_int ( 0 , 1000000 ).".".$request->file('image')->getClientOriginalExtension();
        // Upload File
        $path = $request->file('image')->storeAs('public/images/', $fileNameToStore);
        $image = new images;
        $image->link = '/storage/images/'.$fileNameToStore;
        $image->about = $request->about;
        $image->hashtag = $request->hashtag;
        $image->trusted = 2;
        $image->user_id = Auth::user()->id;
        $image->tourist_spot_id = $request->spot_id;
        ######################################################
        $spot = touristSpots::where("id", $request->spot_id) ->first();
        while(1){
            $where = "level_".$spot->level."_spot_id";
            $image[$where] = $spot->id;
            if($spot->upper_spot_id==0) break;
            $spot = touristSpots::where("id", $spot->upper_spot_id) ->first();
        }
        ######################################################
        $image->save();
        return back()->with("message", "Success");
        return $request;
    }

    public function showTouristSpotSite($spot_id){
        $array = array ($spot_id);
        $spotFullInfo = $this->touristSpotFullInfomation($array, 9, 0, 1)[0];
        $data = array (
            "spot" => $spotFullInfo,
        );
        #return $spotFullInfo;
        return view('admin.touristSpot.touristSpotShowInfo')->with($data);
    }


}
