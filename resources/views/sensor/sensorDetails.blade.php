<?php $pageSubTitle = 'sensorsDetails' ?>
@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="title-breadcrumb">
                    <h2 class="pull-left">
                        Devices Status
                    </h2>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home main-color"></i></a></li>
                        <li>devices status</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="bubble">
                    <div class="bubble-head">
                        <i class="fa fa-bar-chart"></i> <span>Reports</span>
                    </div>
                    <div class="bubble-body">
                        <span><a href="{{ url('/reports') }}">reports</a> to see more information about the previous data</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bubble">
                    <div class="bubble-head">
                        <i class="fa fa-umbrella"></i> <span>Weather</span>
                    </div>
                    <div class="bubble-body second-color">
                        <span>More information about the weather status of today is <a href="{{ url('/weather') }}"> here</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-alarm">
                <div class="panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-bell-o main-color"></i> Alarm</h4>
                    </div>
                    <div class="panel-body background-white">
                        @foreach($alarm as $a)
                            @php
                                $theStatus = $a->status
                            @endphp
                        @endforeach

                        @if($theStatus == "off")
                            <div>
                                <span>The alarm is </span>
                                <span class="main-color">{{ $a->status }}</span>
                            </div>
                            @if(auth()->user()->admin == 1)
                                <div>
                                    <span>Turn the alarm</span> <span class="main-color"> on </span> <span>, in which level <i class="fa fa-question color-red"></i></span>
                                    <a href="http://localhost/ewsf/resources/views/handle/handle.turnon.php?alarm=one"><span style="background-color:green;color:white">Level 1</span></a> |
                                    <a href="http://localhost/ewsf/resources/views/handle/handle.turnon.php?alarm=two"><span style="background-color:yellow;color:black">Level 2</span></a> |
                                    <a href="http://localhost/ewsf/resources/views/handle/handle.turnon.php?alarm=three"><span style="background-color:red;color:white">Level 3</span></a> |
                                    
                                </div>
                             @endif
                        @else
                            <div>
                                <span>The alarm is </span>
                                <span class="main-color">{{ $a->status }}</span>
                            </div>
                            @if(auth()->user()->admin == 1)
                                <div>
                                    <span>To turn the alarm </span> <span class="main-color">off</span> , <a href="http://localhost/ewsf/resources/views/handle/handle.turnon.php?alarm=off"> click here</a> |
                                    
								</div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if(count($allSensorData) >= 1)
                    {!! $sensorDataMean_chart->html() !!}
                @else
                    <div class="msg-feedback">
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="fa fa-warning"></i> Warning !</strong><span>No Data Available in Database to show real time chart for the mean value</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="chart">
                    @if(count($allSensorData) >= 1)
                        {!! $sensor1_chart->html() !!}
                    @else
                        <div class="msg-feedback">
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="fa fa-warning"></i> Warning !</strong><span>No data available in database to show real time chart for the ultrasonic sensor data</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="device-detail">
                    @foreach($ultransonic as $u)
                        <p>Device Name is <strong class="main-color">{{ $u->device_name }}</strong></p>
                        <p>Device Status is <strong class="main-color">{{ $u->status }}</strong></p>
                    @endforeach
                </div>
                <!--div id="map-1" style="width: 400px; height: 300px"></div-->
            </div>
            <div class="col-md-6">
                <div class="chart">
                    @if(count($allSensorData) >= 1)
                        {!! $sensor2_chart->html() !!}
                    @else
                        <div class="msg-feedback">
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="fa fa-warning"></i> Warning !</strong><span>No data available in database to show real time chart for the water sensor data</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="device-detail">
                    @foreach($waterSensor as $w)
                        <p>Device Name is <strong class="main-color">{{ $w->device_name }}</strong></p>
                        <p>Device Status is <strong class="main-color">{{ $w->status }}</strong></p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
        	<div class="col-md-12">
        		<div id="map" style="width: 400px; height: 300px"></div>
        	</div>
        </div>

        <div class="row hidden-sm hidden-xs">
            <div class="col-md-6 col-md-offset-3">
                <div class="content-separator">
                    <img src="{{ url("../images/EWSF logo.png") }}" class="img-responsive"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="report-control">
                <div class="col-md-12">
                    <div class="pull-left">
                        <h3>Sensors Data</h3>
                    </div>
                    <div class="pull-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ url('/sensors-details') }}" class="btn btn-link"><i class="fa fa-refresh"></i></a>
                            <button type="button" class="btn btn-danger">Export</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/getSensorDataPDF') }}"><i class="fa fa-file-pdf-o"></i> <span>Export To PDF</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            @if(count($allSensorData) >= 1)
            <div class="report-data" id="sensor-table">
                {{--<div class="col-md-1"></div>--}}
                <div class="col-md-12">
                    <div class="report-sensor-data" id="report-sensor-data">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condense table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Arduino #1 [sensor #1]</th>
                                    <th class="text-center">Arduino #2 [sensor #2]</th>
                                    <th class="text-center">Mean</th>
                                    <th class="text-center"><i class="fa fa-calendar"></i> Adding Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allSensorData as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->arduino_1 }}</td>
                                        <td>{{ $s->arduino_2 }}</td>
                                        <td>{{ $s->mean }}</td>
                                        <td>{{ $s->created_at }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            @else
                <div class="col-md-12">
                    <div class="msg-feedback">
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="fa fa-warning"></i> Warning !</strong><span>No data available in database</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div id="sensor-paginate">
                <div class="col-xs-12 text-center">
                {{ $allSensorData->links() }}
            </div>
            </div>
        </div>
    </div>

    {!! Charts::scripts() !!}
    {!! $sensorDataMean_chart->script() !!}
    {!! $sensor1_chart->script() !!}
    {!! $sensor2_chart->script() !!}
@endsection