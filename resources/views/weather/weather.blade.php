<?php $pageSubTitle = 'weather' ?>
@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="title-breadcrumb">
                <h2 class="pull-left">
                    Weather Data
                </h2>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home main-color"></i></a></li>
                    <li>weather data</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center weather-data">
                <div class="row">
                    <div class="col-md-2">
                        <div class="w-time-date">
                            <div class="w-time" id="w-time">{{ date("h:i a") }}</div>
                            <div class="main-color w-date">{{ date("M d, Y") }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="w-temp">
                            @foreach($temp as $t)
                                <div>{{ $t->temp }}<sup><i class="fa fa-circle-o"></i></sup><sub>C</sub><sup>F</sup></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="">
                            @foreach($outlook as $o)
                                @php
                                    $outlook =  $o->outlook;
                                    $imgSRC = '/images/weather/' . $outlook . '.png';
                                @endphp
                            @endforeach
                            <img src="{{ url($imgSRC) }}" class="img-responsive center-block"/>
                            <p class="main-color">{{ $outlook }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 text-left">
                        <div class="w-day-wind-humi">
                            <div class="w-day">
                                @foreach($day as $d)
                                    {{ $d->day }}
                                @endforeach
                            </div>
                            <div class="w-wind">
                                @foreach($wind_speed as $w)
                                    <span>Wind speed | </span>{{ $w->wind_speed }}
                                @endforeach
                            </div>
                            <div class="w-humi">
                                @foreach($humidity as $h)
                                    <span>Humidity | </span>{{ $h->humidity }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-right w-desc">
                            <span>The Weather Look Clear. Go out and have some fun</span> <i class="fa fa-smile-o main-color"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="weather-report">
                <div2 class="pull-left"><h3>Weather Data Report</h3></div2>
                <div class="pull-right">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ url('/weather') }}" class="btn btn-link"><i class="fa fa-refresh"></i></a>
                        <button type="button" class="btn btn-danger">Export</button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/getWeatherDataPDF') }}"><i class="fa fa-file-pdf-o"></i> <span>Export To PDF</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        @if(count($all_weather_data) >= 1)
        <div id="weather-table">
            <div class="col-md-12">
                <div class="table-responsive text-center">
                    <table class="table table-bordered table-condense table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#ID</th>
                                <th class="text-center">Day</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Outlook</th>
                                <th class="text-center">Temperature</th>
                                <th class="text-center">Temp min</th>
                                <th class="text-center">Temp max</th>
                                <th class="text-center">Pressure</th>
                                <th class="text-center">Humidity</th>
                                <th class="text-center">Sea level</th>
                                <th class="text-center">Ground level</th>
                                <th class="text-center">Wind speed</th>
                                <th class="text-center">Wind degree</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_weather_data as $w)
                                <tr>
                                    <td>{{ $w->id }}</td>
                                    <td>{{ $w->day }}</td>
                                    <td>{{ $w->created_at }}</td>
                                    <td>{{ $w->outlook }}</td>
                                    <td>{{ $w->temp }}</td>
                                    <td>{{ $w->temp_min }}</td>
                                    <td>{{ $w->temp_max }}</td>
                                    <td>{{ $w->pressure }}</td>
                                    <td>{{ $w->humidity }}</td>
                                    <td>{{ $w->sea_level }}</td>
                                    <td>{{ $w->grnd_level }}</td>
                                    <td>{{ $w->wind_speed }}</td>
                                    <td>{{ $w->wind_degree }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
            <div class="col-md-12">
                <div class='panel panel-danger'>
                    <div class='panel-heading'>
                        <h2 class='panel-title'><i class='fa fa-info-circle'></i> No Information</h2>
                        </div>
                    <div class='panel-body'>
                        <p><i class="fa fa-smile-o"></i> No data of 'weathers' table to be displayed. The table is empty.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div id="weather-paginate">
            <div class="col-md-12 text-center">
                {{ $all_weather_data->links() }}
            </div>
        </div>
    </div>

</div>
@endsection