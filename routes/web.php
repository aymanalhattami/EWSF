<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**********************************************************************************/
Route::get('/', 'DashboardController@dashboard');
Route::get('/dashboard', 'DashboardController@dashboard');
Route::get('/weather', 'WeatherController@index');
Route::get('/sensors-details', 'SensorDetailsController@index');
Route::get('/reports', 'ReportController@allSensorData');
Route::get('/weather-store', 'WeatherController@store');
Route::get('/getWeatherByAjax', 'WeatherController@getWeatherByAjax');
Route::resource('/weather', 'WeatherController');
Auth::routes();
Auth::routes();
Route::get('/getTime', 'DashboardController@getTime');
Route::get('/sensor-mean-data', 'SensorDetailsController@selectSensorsMean');
Route::get('/sensor1_data', 'SensorDetailsController@sensor1_data');
Route::get('/sensor2_data', 'SensorDetailsController@sensor2_data');
Route::get('/deleteAllSensorData', 'SensorDetailsController@deleteAll');
Route::get('/getSensorDataPDF', 'ReportController@getPDF');
Route::get('/getWeatherDataPDF', 'WeatherController@getPDF');
Route::get('/dashboard-sensor-mean-data', 'DashboardController@selectSensorsMean');
Route::get('/delete-sensor-data/{id}', 'SensorDetailsController@destroy');
Route::get('/insert-weather-data', 'WeatherController@store');
Route::get('/delete-weather-record/{id}', 'WeatherController@destroy');
Route::get('/getTimeToWeatherPage', 'WeatherController@getTimeToWeatherPage');
Route::resource('/users', 'UserController');
Route::get('/report-date', 'ReportController@allSensorData');

//route to page without controller
Route::get('/check_arduino', function(){
    return view('handle.check_arduino');
});

Route::get('/maps', 'MapsController@index');
Route::get('/searchMap', 'MapsController@searchMap');
Route::get('/trucate_arduinos_table', "SensorDetailsController@truncate");
Route::get('/user_search','UserController@search');
Route::get('/users/{id}/delete', 'UserController@delete');
Route::get('/admins', 'UserController@admins');
Route::get('/users_not_admins', 'UserController@users_not_admins');
Route::get('/about', function (){
    return view('about');
});
Route::get('/auditing', 'AuditingController@index');
Route::get('/auditing_search', 'AuditingController@search');
Route::get('/audit_pdf', 'AuditingController@getPDF');
