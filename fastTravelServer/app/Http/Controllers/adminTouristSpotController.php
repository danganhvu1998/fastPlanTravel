<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristSpots;

class adminTouristSpotController extends Controller
{
    public function __construct()
    {
        $this->middleware(['checkAdmin']);
    }

    public function addTouristSpotSite(){
        return view("admin.touristSpotAdd");
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
        $spotsFullInfo = $this->touristSpotFullInfomation($spots);
        $data = array(
            "spots" => $spotsFullInfo,
        );
        return view('admin.touristSpotShowAll')->with($data);
    }

    public function touristSpotFullInfomation($spots, $numImgNeed=1){
        $spotsFullInfo = touristSpots::whereIn("id", $spots)->get();
        return $spotsFullInfo;
    }

    public function showTouristSpot($spot_id){
        $array = array ($spot_id);
        $spotFullInfo = $this->touristSpotFullInfomation($array)[0];
        return $spotFullInfo;
    }
}
