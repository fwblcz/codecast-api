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
      $api->post('user/login','AuthController@authenticate');
      $api->post('user/register','AuthController@register');
      $api->group(['middleware' => 'jwt.auth'], function ($api) {
         $api->get('user/me','AuthController@getAuthenticatedUser');
         $api->get('lessons','LessonsController@index');
         $api->get('lessons/{id}', 'LessonsController@show');
      });
   });
});
