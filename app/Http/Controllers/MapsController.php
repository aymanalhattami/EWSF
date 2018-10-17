<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;
use App\Map;
use DB;


class MapsController extends Controller
{
    protected $gmaps;

    public function __construct(GMaps $gmaps)
    {
        $this->gmaps = $gmaps;
    }

    public function index()
    {
        return view('maps.maps');
    }

    public function searchMap(Request $request)
    {
//        $lat_s = substr($request->lat, 0, 5);
//        $lng_s = substr($request->lng, 0, 5);

//        $lat = (float)$lat_s;
//        $lng = (float)$lng_s;
        $map = DB::select("SELECT * FROM map ORDER BY id DESC");

        return $map;
    }
}
