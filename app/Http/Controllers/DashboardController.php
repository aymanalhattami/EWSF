<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arduino;
use Charts;
use DB;

class DashboardController extends Controller
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
    public function dashboard()
    {
        $weather_outlook = DB::select("SELECT outlook FROM weathers ORDER BY id DESC LIMIT 1");
        $last_sensor1_mean = DB::select("SELECT mean FROM arduinos ORDER BY id DESC LIMIT 1");
        $last_sensor2_mean = DB::select("SELECT mean FROM arduinos ORDER BY id DESC LIMIT 1");
        $sensor1_min = DB::select("SELECT MIN(arduino_1) AS sensor1_min FROM arduinos");
        $sensor1_max = DB::select("SELECT MAX(arduino_1) AS sensor1_max FROM arduinos");
        $sensor2_min = DB::select("SELECT MIN(arduino_2) AS sensor2_min FROM arduinos");
        $sensor2_max = DB::select("SELECT MAX(arduino_2) AS sensor2_max FROM arduinos");
        $sendingDeviceUltrasonic = DB::select("SELECT * FROM device_status WHERE device_id = 1");
        $sendingNodeMCU = DB::select("SELECT * FROM device_status WHERE device_id = 2");
        $waterLevelSensor = DB::select("SELECT * FROM device_status WHERE device_id = 3");
        $receivingNodeMCU = DB::select("SELECT * FROM device_status WHERE device_id = 4");
        $alarm = DB::select("SELECT * FROM device_status WHERE device_id = 5");

        $sensorDataMean_chart = Charts::realtime(url('dashboard-sensor-mean-data'), 1000, 'area', 'highcharts')
            ->title("Average Sensor Data Reading")
            ->responsive(true)
            ->elementLabel("avg");
            /*->colors(["#f34d53"]);*/

        return view('dashboard.dashboard',
            compact('sensorDataMean_chart', 'weather_outlook', 'last_sensor1_mean', 'last_sensor2_mean', 'sensor1_min', 'sensor1_max', 'sensor2_min', 'sensor2_max', 'sendingDeviceUltrasonic', 'sendingNodeMCU', 'waterLevelSensor', 'receivingNodeMCU', 'alarm'));
    }

    public function getTime()
    {
        date_default_timezone_set('Asia/Kuwait');
        echo date('h:i:s a');
    }

    public function getSensotsDataChart()
    {
//        $sensorDataMean_chart = Charts::realtime(url('dashboard-sensor-mean-data'), 1000, 'line', 'highcharts')
//            ->title("Mean of Sensor Data")
//            ->responsive(true);
//
//        return view('dashboard.dashboard', compact('sensorDataMean_chart'));
    }

    public function selectSensorsMean()
    {
        $last = Arduino::orderBy('id', 'desc')->first();
        $arduino1 = $last->arduino_1;
        $arduino2 = $last->arduino_2;
        $sum = ($arduino1 + $arduino2);
        $mean = (float)$sum / 2;
        return ['value' => $mean];
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
    public function store(Request $request)
    {
        //
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
        //
    }

    public function getArduinoMean()
    {
//        $last = Arduino::orderBy('id', 'desc')->first();
//        $arduino1 = $last->arduino_1;
//        $arduino2 = $last->arduino_2;
//        $sum = ($arduino1 + $arduino2);
//        $mean = (float)$sum / 2;
//
//        return $mean;
    }

    public function getWeatherStatus()
    {
//        $last = Weather::orderBy('id', 'desc')->first();
//        $weather_status = $last->weather_status;
//
//        return $weather_status;
    }
}
