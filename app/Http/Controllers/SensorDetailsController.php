<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Arduino;
use Charts;
use App\DeviceStatus;

class SensorDetailsController extends Controller
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
        $allSensorData = Arduino::orderBy('created_at', 'desc')->paginate(15);

        $ultransonic = DB::select("SELECT * FROM device_status WHERE device_id = 1");
        $waterSensor = DB::select("SELECT * FROM device_status WHERE device_id = 3");
        $alarm = DB::select("SELECT * FROM device_status WHERE device_id = 5");

        $sensorDataMean_chart = Charts::realtime(url('sensor-mean-data'), 1000, 'area', 'highcharts')
            ->title("Mean of Sensor Data")
            ->elementLabel("avg")
            ->responsive(true);
//            ->colors(["#fe892d"]);

        $sensor1_chart = Charts::realtime(url('sensor1_data'), 1000, 'area', 'highcharts')
            ->title('Sensor #1 Data')
            ->elementLabel("Ultrasonic sensor data")
            ->responsive(true);

        $sensor2_chart = Charts::realtime(url('sensor2_data'), 1000, 'area', 'highcharts')
            ->title('Sensor #2 Data')
            ->elementLabel("water level sensor data")
            ->responsive(true);

        return view('sensor.sensorDetails', compact('allSensorData', 'sensorDataMean_chart', 'sensor1_chart', 'sensor2_chart', 'ultransonic', 'waterSensor', 'alarm'));
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
        $deleteElement = Arduino::find($id);
        $deleteElement->delete();

        return redirect('/sensors-details');
    }

    public  function truncate()
    {
        DB::table('arduinos')->truncate();
        return "All Data Deleted ";
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

    public function sensor1_data()
    {
        $last = Arduino::orderBy('id', 'desc')->first();
        $sensor1_data = $last->arduino_1;
        return ['value' => (float)$sensor1_data];
    }

    public function sensor2_data()
    {
        $last = Arduino::orderBy('id', 'desc')->first();
        $sensor2_data = $last->arduino_2;
        return ['value' => (float)$sensor2_data];
    }

    public function report_date()
    {

    }
}
