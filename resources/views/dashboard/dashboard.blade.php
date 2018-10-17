<?php $pageSubTitle = 'dashboard' ?>
@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="title-breadcrumb">
                    <h2 class="pull-left">
                        Dashboard <small>summary</small>
                    </h2>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home main-color"></i></a></li>
                        <li><a href="#"></a></li>
                    </ol>
                </div>
            </div>
        </div>

        @php
            $dangerLevel = null;
        @endphp
        @foreach($last_sensor1_mean as $lm)
            @php $dangerLevel = $lm->mean @endphp
        @endforeach
        <div class="row">
            <div class="col-md-12">
                @if($dangerLevel == null)
                    <div class="msg-feedback">
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="fa fa-warning"></i> Warning !</strong><span>No Data Available in Database</span>
                        </div>
                    </div>
                @endif

                @if($dangerLevel > "10")
                    <div class="">
                        <div class="alert alert-dismissable alert-danger msg-feedback">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="fa fa-warning"></i> Danger !</strong><span>The level of water is high</span>
                        </div>
                    </div>
                @endif

                @if($dangerLevel > "5" && $dangerLevel <= "10")
                    <div class="">
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="fa fa-warning"></i> Warning !</strong><span>The level of water is meduim</span>
                        </div>
                    </div>
                @endif

                @if($dangerLevel <= "5")
                    <div class="">
                        <div class="alert alert-dismissable alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong><i class="fa fa-info-circle"></i> Safe ! </strong><span>The level of water is low</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="weather-status" id="weather-status">
                    <div class="panel panel-default">
                        <div class="panel-heading background-blue color-white">
                            <h2 class="panel-title">
                                <i class="fa fa-bolt"></i>
                                <span>Weather</span>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @foreach($weather_outlook as $wo)
                                    @php
                                        $outlook =  $wo->outlook;
                                        $imgSRC = '/images/weather/' . $outlook . '.png';
                                    @endphp
                                @endforeach
                                <div class="col-md-4">
                                    <div class="text-center"><img class="img-responsive center-block" src="{{ url($imgSRC) }}" width="150" height="100" /></div>
                                    <div class="text-center main-color cls-weigh-size">
                                        <span data-toggle="tooltip" data-placement="top" title="weather status of today">{{ $outlook }}</span>
                                    </div>
                                </div>
                                <div class="col-md-8 ele-border-top">
                                    <div class="main-color text-center city"><img src="{{ url('../images/Geo-fence_99px.png') }}" width="40" /> Sana'a </div>
                                    <div class="text-center time" id="time">
                                        <span>00:00:00 AM</span>
                                    </div>
                                    <div class="text-center date">
                                        {{ date('Y/M/d') }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="day">
                                    <div class="col-md-6 text-center main-color cls-weigh-size">
                                        <span data-toggle="tooltip" data-placement="right" title="Today">{{ date('D') }}</span>
                                    </div>
                                    <div class="col-md-6 text-center second-color cls-weigh-size">
                                        <span data-toggle="tooltip" data-placement="left" title="Tomorrow">{{ date('D', strtotime(date('D') . ' + 1 days')) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sensor-avg">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="fa fa-info-circle"></span>
                                <span>Arduino Data </span>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <h4>Arduino 1</h4>
                                    <div class="center-block sensor-value">
                                        @if($last_sensor1_mean != null)
                                            @foreach($last_sensor1_mean as $lm)
                                                <span  data-toggle="tooltip" data-placement="top" title="This the average value of arduino #1 read data">{{ $lm->mean }}</span>
                                            @endforeach
                                        @else
                                            <i class="fa fa-question" data-toggle="tooltip" data-placement="top" title="no data"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <h4>Arduino 2</h4>
                                    <div class="center-block sensor-value">
                                        @if($last_sensor2_mean != null)
                                            @foreach($last_sensor2_mean as $lm)
                                                <span  data-toggle="tooltip" data-placement="top" title="This the average value of arduino #2 read data">{{ $lm->mean }}</span>
                                            @endforeach
                                        @else
                                            <i class="fa fa-question" data-toggle="tooltip" data-placement="top" title="no data"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="pull-left"></div>
                            <a class="pull-right color-blue" href="{{ url('sensors-details') }}"><i class="fa fa-angle-double-right"></i> Details</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert-status">
                    <div class="panel panel-default">
                        @foreach($alarm as $a)
                            <div class="panel-heading main-background color-white">
                                <h4 class="panel-title">{{ $a->device_name }} - status</h4>
                            </div>
                            <div class="panel-body text-center">
                                <img width="40" src="{{ url('/images/off.png') }}">
                                <br>
                                <span class="main-color text-center" style="font-size: 32px; font-weight: bold">{{ $a->status }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    @foreach($sendingDeviceUltrasonic as $su)
                        <div class="panel-heading background-blue color-white ">
                            <h4 class="panel-title">{{ $su->device_name }}</h4>
                        </div>
                        <div class="panel-body">
                            <span class="main-color">{{ $su->status }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    @foreach($sendingNodeMCU as $sm)
                        <div class="panel-heading background-blue color-white">
                            <h4 class="panel-title">{{ $sm->device_name }} - status</h4>
                        </div>
                        <div class="panel-body">
                            <span class="main-color">{{ $sm->status }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    @foreach($waterLevelSensor as $wl)
                        <div class="panel-heading background-blue color-white ">
                            <h4 class="panel-title">{{ $wl->device_name }} - status</h4>
                        </div>
                        <div class="panel-body">
                            <span class="main-color">{{ $wl->status }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    @foreach($receivingNodeMCU as $rm)
                        <div class="panel-heading background-blue color-white ">
                            <h4 class="panel-title">{{ $rm->device_name }} - status</h4>
                        </div>
                        <div class="panel-body">
                            <span class="main-color">{{ $rm->status }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="dashboard-chart">
                <div class="col-md-12">
                    @if($dangerLevel != null)
                        {!! $sensorDataMean_chart->html() !!}
                    @else
                        <div class="msg-feedback">
                            <div class="alert alert-dismissable alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="fa fa-warning"></i> Warning !</strong><span>No Data Available in Database to show real time chart</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Charts::scripts() !!}
    {!! $sensorDataMean_chart->script() !!}
@endsection