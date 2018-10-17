<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weather;
use DB;
use PDF;

class WeatherController extends Controller
{
    //allow only the authenticated user to access to this controller and its related views[ % from laravel.com site ]
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp = DB::select("SELECT temp FROM weathers ORDER BY id DESC LIMIT 1");
        $day = DB::select("SELECT day FROM weathers ORDER BY id DESC LIMIT 1");
        $wind_speed = DB::select("SELECT wind_speed FROM weathers ORDER BY id DESC LIMIT 1");
        $humidity = DB::select("SELECT humidity FROM weathers ORDER BY id DESC LIMIT 1");
        $outlook = DB::select("SELECT outlook FROM weathers ORDER BY id DESC LIMIT 1");

        $all_weather_data = Weather::orderBy('id', 'desc')->paginate(15);
        return view('weather.weather', compact('all_weather_data', 'all_weather_data', 'temp', 'day', 'wind_speed', 'humidity', 'outlook'));
    }

    public function getWeatherByAjax()
    {
        $last = Weather::orderBy('id', 'desc')->first();
        $weather_status = $last->weather_status;

        return $weather_status;
    }

    public function getPDF()
    {
        DB::insert("INSERT INTO auditing (`user_email`, `user_name`, `type`, `action`) VALUES('" . auth()->user()->email . "', '" . auth()->user()->name . "', 'Generate Report', 'weather data reports')");

        $allWeatherData = DB::select("SELECT * FROM weathers ORDER BY id DESC");

        $pdf = PDF::loadView('weather.weatherPDF', ['allWeatherData' => $allWeatherData]);

        return $pdf->download('WeatherData.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(/*Request $request*/)
    {
        $weather_data = $this->weather_status();
        $weatherTable = new Weather();//object of the Post Model

        $weatherTable->day = date('D');
        $weatherTable->outlook = $weather_data["weather"][0]["description"]; /* "outlook" in this project => in third party weather site is "description" */
        $weatherTable->temp = $weather_data["main"]["temp"];
        $weatherTable->pressure = $weather_data["main"]["pressure"];
        $weatherTable->humidity = $weather_data["main"]["humidity"];
        $weatherTable->temp_min = $weather_data["main"]["temp_min"];
        $weatherTable->temp_max = $weather_data["main"]["temp_max"];
        $weatherTable->sea_level = $weather_data["main"]["sea_level"];
        $weatherTable->grnd_level = $weather_data["main"]["grnd_level"];
        $weatherTable->wind_speed = $weather_data["wind"]["speed"];
        $weatherTable->wind_degree = $weather_data["wind"]["deg"];
        $weatherTable->save();

//        return "Done Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteElement = Weather::find($id);
        $deleteElement->delete();

        return redirect('/weather');
    }

    public  function deleteAll()
    {
        if($_GET['action'] == 'deleteAll')
        {
            DB::table('weathers')->delete();
//            return "All Data Deleted ";
        }
    }

    public function curl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);

        return $data;
    }

    public function weather_status()
    {
        $urlContents = $this->curl("http://api.openweathermap.org/data/2.5/weather?q=sanaa&appid=c4d76312b2ec9c977c7cf4058c9611e3");

        $weatherArray = json_decode($urlContents, true);

        return $weatherArray;

    }

    public function getTimeToWeatherPage()
    {
        date_default_timezone_set('Asia/Kuwait');
        return date('h:i a');
    }
}

