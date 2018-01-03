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

//Route::group(['prefix'=>'api/v1'], function () {
//   Route::resource('lessons','LessonsController');
//});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
   $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
      $api->get('lessons', 'LessonsController@index');
      $api->get('lessons/{id}', 'LessonsController@show');
   });
});
