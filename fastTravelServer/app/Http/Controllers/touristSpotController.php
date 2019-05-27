<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\touristSpots;

class touristSpotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addImageToTouristSpotSite($spot_id){
        
    }
}
