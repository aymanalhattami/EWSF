<?php

namespace App\Http\Controllers;

use App\Arduino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;
use PDF;
use App\PastArduinos;


class ReportController extends Controller
{
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

    }

    public function allSensorData()
    {
        if(isset($_GET['from']) && isset($_GET['to']))
        {
            $from = $_GET['from'];
            $to = $_GET['to'];

            session(["from" => $from, 'to' => $to]);

            $allSensorDataWithoutPaginate = DB::select("SELECT * FROM past_arduinos WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");
            $allSensorDataWithPaginate = null;

            $sensorReadTime = DB::select("SELECT created_at FROM past_arduinos  WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");
            //change the $sensorReadTime into array
            $sensorReadTimeArray = array();
            foreach($sensorReadTime as $st)
                $sensorReadTimeArray[] = $st->created_at;

            /***********************************************************************************/
            //retrieve data from database for sensor 1
            $sensor1_data = DB::select("SELECT arduino_1 FROM past_arduinos  WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");

            //store sensor 1 data to array to be used in the chart
            $sensor1_data_array = [];
            foreach($sensor1_data as $s)
                $sensor1_data_array[] = $s->arduino_1;

            //sensor 1 data chart
            $sensor1_chart = Charts::create('area', 'highcharts')
                ->title('Sensor 1 Data Chart')
                ->elementLabel("Sensor 1 Read")
                ->labels($sensorReadTimeArray)
                ->values($sensor1_data_array)
                ->responsive(true);


            /***********************************************************************************/
            //retrieve data from database for sensor 2
            $sensor2_data = DB::select("SELECT arduino_2 FROM past_arduinos  WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");

            //store sensor 2 data to array to be used in the chart
            $sensor2_data_array = [];
            foreach($sensor2_data as $s)
                $sensor2_data_array[] = $s->arduino_2;

            //sensor 2 data chart
            $sensor2_chart = Charts::create('area', 'highcharts')
                ->title('Sensor 2 Data Chart')
                ->elementLabel("Sensor 2 Read")
                ->labels($sensorReadTimeArray)
                ->values($sensor2_data_array)
                ->responsive(true);

            /***********************************************************************************/
            //retrieve data from database for the mean of sensor 1 and sensor 2
            $sensors_mean = DB::select("SELECT mean FROM past_arduinos  WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");

            //store sensors data mean in array to be used in the chart
            $sensors_mean_array = [];
            foreach($sensors_mean as $m)
                $sensors_mean_array[] = $m->mean;

            //sensors mean charts
            $sensors_mean_chart = Charts::create('area', 'highcharts')
                ->title('Sensors Average Chart')
                ->elementLabel("AVG sensor")
                ->labels($sensorReadTimeArray)
                ->values($sensors_mean_array)
                ->responsive(true);


        }
        else
        {
            session(["from" => '', 'to' => '']);

            $allSensorDataWithPaginate = PastArduinos::orderBy('id', 'desc')->paginate(15);
            $allSensorDataWithoutPaginate = null;

            $sensorReadTime = DB::select("SELECT created_at FROM past_arduinos ORDER BY id DESC");
            //change the $sensorReadTime into array
            $sensorReadTimeArray = array();
            foreach($sensorReadTime as $st)
                $sensorReadTimeArray[] = $st->created_at;

            /***********************************************************************************/
            //retrieve data from database for sensor 1
            $sensor1_data = DB::select("SELECT arduino_1 FROM past_arduinos ORDER BY id DESC");

            //store sensor 1 data to array to be used in the chart
            $sensor1_data_array = [];
            foreach($sensor1_data as $s)
                $sensor1_data_array[] = $s->arduino_1;

            //sensor 1 data chart
            $sensor1_chart = Charts::create('area', 'highcharts')
                ->title('Sensor 1 Data Chart')
                ->elementLabel("Sensor 1 Read")
                ->labels($sensorReadTimeArray)
                ->values($sensor1_data_array)
                ->responsive(true);


            /***********************************************************************************/
            //retrieve data from database for sensor 2
            $sensor2_data = DB::select("SELECT arduino_2 FROM past_arduinos ORDER BY id DESC");

            //store sensor 2 data to array to be used in the chart
            $sensor2_data_array = [];
            foreach($sensor2_data as $s)
                $sensor2_data_array[] = $s->arduino_2;

            //sensor 2 data chart
            $sensor2_chart = Charts::create('area', 'highcharts')
                ->title('Sensor 2 Data Chart')
                ->elementLabel("Sensor 2 Read")
                ->labels($sensorReadTimeArray)
                ->values($sensor2_data_array)
                ->responsive(true);

            /***********************************************************************************/
            //retrieve data from database for the mean of sensor 1 and sensor 2
            $sensors_mean = DB::select("SELECT mean FROM past_arduinos ORDER BY id DESC");

            //store sensors data mean in array to be used in the chart
            $sensors_mean_array = [];
            foreach($sensors_mean as $m)
                $sensors_mean_array[] = $m->mean;

            //sensors mean charts
            $sensors_mean_chart = Charts::create('area', 'highcharts')
                ->title('Sensors Average Chart')
                ->elementLabel("AVG sensor")
                ->labels($sensorReadTimeArray)
                ->values($sensors_mean_array)
                ->responsive(true);
        }

        return view('reports.reports', compact('allSensorDataWithPaginate', 'allSensorDataWithoutPaginate', 'sensor1_chart', 'sensor2_chart', 'sensors_mean_chart', 'sensorReadTimeArray'));
    }


    public function getPDF()
    {
        DB::insert("INSERT INTO auditings (`user_email`, `user_name`, `type`, `action`) VALUES('" . auth()->user()->email . "', '" . auth()->user()->name . "', 'Generate Report', 'devices data reports')");

        $from = session('from');
        $to = session('to');

        if(isset($from) && isset($to) && $from != null && $to != null)
        {
            $allSensorData = DB::select("SELECT * FROM past_arduinos WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");

            $sensorReadTime = DB::select("SELECT created_at FROM past_arduinos WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");
            //change the $sensorReadTime into array
            $sensorReadTimeArray = array();
            foreach($sensorReadTime as $st)
                $sensorReadTimeArray[] = $st->created_at;

            /***********************************************************************************/
            //retrieve data from database for sensor 1
            $sensor1_data = DB::select("SELECT arduino_1 FROM past_arduinos WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");

            //store sensor 1 data to array to be used in the chart
            $sensor1_data_array = [];
            foreach($sensor1_data as $s)
                $sensor1_data_array[] = $s->arduino_1;

            //sensor 1 data chart
            $sensor1_chart = Charts::create('line', 'highcharts')
                ->title('Sensor 1 Data Chart')
                ->elementLabel("Chart label")
                ->labels($sensorReadTimeArray)
                ->values($sensor1_data_array)
                ->responsive(true);


            /***********************************************************************************/
            //retrieve data from database for sensor 2
            $sensor2_data = DB::select("SELECT arduino_2 FROM past_arduinos WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");

            //store sensor 2 data to array to be used in the chart
            $sensor2_data_array = [];
            foreach($sensor2_data as $s)
                $sensor2_data_array[] = $s->arduino_2;

            //sensor 2 data chart
            $sensor2_chart = Charts::create('line', 'highcharts')
                ->title('Sensor 2 Data Chart')
                ->elementLabel("Chart label")
                ->labels($sensorReadTimeArray)
                ->values($sensor2_data_array)
                ->responsive(true);

            /***********************************************************************************/
            //retrieve data from database for the mean of sensor 1 and sensor 2
            $sensors_mean = DB::select("SELECT mean FROM past_arduinos WHERE created_at BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");

            //store sensors data mean in array to be used in the chart
            $sensors_mean_array = [];
            foreach($sensors_mean as $m)
                $sensors_mean_array[] = $m->mean;

            //sensors mean charts
            $sensors_mean_chart = Charts::create('line', 'highcharts')
                ->title('Sensors Mean Chart')
                ->elementLabel("Chart label")
                ->labels($sensorReadTimeArray)
                ->values($sensors_mean_array)
                ->responsive(true);

            $pdf = PDF::loadView('reports.reportPDF', ['allSensorData' => $allSensorData, 'sensor1_chart' => $sensor1_chart]);

            return $pdf->download('sensorsData.pdf');
        }
        else
        {
            $allSensorData = PastArduinos::orderBy('id', 'desc')->get();

            $sensorReadTime = DB::select("SELECT created_at FROM past_arduinos ORDER BY id DESC");
            //change the $sensorReadTime into array
            $sensorReadTimeArray = array();
            foreach($sensorReadTime as $st)
                $sensorReadTimeArray[] = $st->created_at;

            /***********************************************************************************/
            //retrieve data from database for sensor 1
            $sensor1_data = DB::select("SELECT arduino_1 FROM past_arduinos ORDER BY id DESC");

            //store sensor 1 data to array to be used in the chart
            $sensor1_data_array = [];
            foreach($sensor1_data as $s)
                $sensor1_data_array[] = $s->arduino_1;

            //sensor 1 data chart
            $sensor1_chart = Charts::create('line', 'highcharts')
                ->title('Sensor 1 Data Chart')
                ->elementLabel("Chart label")
                ->labels($sensorReadTimeArray)
                ->values($sensor1_data_array)
                ->responsive(true);


            /***********************************************************************************/
            //retrieve data from database for sensor 2
            $sensor2_data = DB::select("SELECT arduino_2 FROM past_arduinos ORDER BY id DESC");

            //store sensor 2 data to array to be used in the chart
            $sensor2_data_array = [];
            foreach($sensor2_data as $s)
                $sensor2_data_array[] = $s->arduino_2;

            //sensor 2 data chart
            $sensor2_chart = Charts::create('line', 'highcharts')
                ->title('Sensor 2 Data Chart')
                ->elementLabel("Chart label")
                ->labels($sensorReadTimeArray)
                ->values($sensor2_data_array)
                ->responsive(true);

            /***********************************************************************************/
            //retrieve data from database for the mean of sensor 1 and sensor 2
            $sensors_mean = DB::select("SELECT mean FROM past_arduinos ORDER BY id DESC");

            //store sensors data mean in array to be used in the chart
            $sensors_mean_array = [];
            foreach($sensors_mean as $m)
                $sensors_mean_array[] = $m->mean;

            //sensors mean charts
            $sensors_mean_chart = Charts::create('line', 'highcharts')
                ->title('Sensors Mean Chart')
                ->elementLabel("Chart label")
                ->labels($sensorReadTimeArray)
                ->values($sensors_mean_array)
                ->responsive(true);

            $pdf = PDF::loadView('reports.reportPDF', ['allSensorData' => $allSensorData, 'sensor1_chart' => $sensor1_chart, 'from' => $from, "to" => $to]);

            return $pdf->download('sensorsData.pdf');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arduino.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    }
}
