<?php $pageSubTitle = 'reports' ?>
@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="title-breadcrumb">
                    <h2 class="pull-left">
                        Reports
                    </h2>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home main-color"></i></a></li>
                        <li>reports</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel-default report-date">
                    <div class="panel-heading background-blue color-white">
                        <h4 class="panel-title pull-left h4-padding">Report date</h4>
                        <a class="pull-right" href="{{ url('/reports') }}">All data</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body background-white">
                        <form class="form-horizontal" action="report-date" method="GET">
                            <div class="form-group">
                                <label for="from" class="control-label col-md-1">From</label>
                                <div class="col-md-5">
                                    <p><input type="date" name="from" class="form-control" required /></p>
                                </div>
                                <label for="to" class="control-label col-md-1">To</label>
                                <div class="col-md-5">
                                    <input type="date" name="to" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm pull-right">Generate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bubble">
                    <div class="bubble-head color-white">
                        <i class="fa fa-bars"></i> <span>Devices Status</span>
                    </div>
                    <div class="bubble-body second-color">
                        <span>Go to <a href="{{ url('/sensors-details') }}">device status page</a> if you need to see more information</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="bubble">
                    <div class="bubble-head color-white">
                        <i class="fa fa-umbrella"></i> <span>Weather</span>
                    </div>
                    <div class="bubble-body second-color">
                        <span>More information about the weather status of today is <a href="{{ url('/weather') }}"> here</a></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="chart">
                    {!! $sensors_mean_chart->html() !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="chart">
                    {!! $sensor1_chart->html() !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart">
                    {!! $sensor2_chart->html() !!}
                </div>
            </div>
        </div>

        <div class="row hidden-xs hidden-sm">
            <div class="col-md-6 col-md-offset-3">
                <div class="content-separator">
                    <img src="{{ url("../images/EWSF logo.png") }}" class="img-responsive"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="report-control">
                <div class="col-md-12">
                    <div class="pull-right export">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ url('/reports') }}" class="btn btn-link"><i class="fa fa-refresh"></i></a>
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
            <div class="report-data">
                {{--<div class="col-md-1"></div>--}}
                <div class="col-md-12">
                    <div class="report-sensor-data" id="report-sensor-data">
                        <div class="table-responsive">
                            <table class="table table-bordered table-condense table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Sensor 1</th>
                                        <th class="text-center">Sensor 2</th>
                                        <th class="text-center">Mean</th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{--@if(!empty($allSensorDataWithPaginate))--}}
                                    {{--@foreach($allSensorDataWithPaginate as $s)--}}
                                        {{--{{ $s->id }}--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--@if(!empty($allSensorDataWithoutPaginate))--}}
                                    {{--@foreach($allSensorDataWithoutPaginate as $s)--}}
                                        {{--{{ $s->id }}--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                @if(!empty($allSensorDataWithPaginate))
                                    @foreach($allSensorDataWithPaginate as $s)
                                        <tr>
                                            <td>{{ $s->id }}</td>
                                            <td>{{ $s->arduino_1 }}</td>
                                            <td>{{ $s->arduino_2 }}</td>
                                            <td>{{ $s->mean }}</td>
                                            <td>{{ $s->created_at }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                @if(!empty($allSensorDataWithoutPaginate))
                                    @foreach($allSensorDataWithoutPaginate as $s)
                                        <tr>
                                            <td>{{ $s->id }}</td>
                                            <td>{{ $s->arduino_1 }}</td>
                                            <td>{{ $s->arduino_2 }}</td>
                                            <td>{{ $s->mean }}</td>
                                            <td>{{ $s->created_at }}</td>
                                        </tr>
                                @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 text-center">
                @if(!empty($allSensorDataWithPaginate))
                    {{ $allSensorDataWithPaginate->links() }}
                @endif
            </div>
        </div>
    </div>

    {!! Charts::Scripts() !!}
    {!! $sensors_mean_chart->script() !!}
    {!! $sensor1_chart->script() !!}
    {!! $sensor2_chart->script() !!}

@endsection