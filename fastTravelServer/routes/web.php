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

Route::get('/', function () {
    return redirect("/home");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

#### Require Login

#### Require Admin

Route::get('/admin/tourist_spot/add', 'adminTouristSpotController@addTouristSpotSite');

Route::post('/admin/tourist_spot/add', 'adminTouristSpotController@addTouristSpot');

Route::get('/admin/tourist_spot/all/{page}/{level_start}/{level_end}', 'adminTouristSpotController@showAllTouristSpots');

Route::get('/admin/tourist_spot/show/{spot_id}', 'adminTouristSpotController@showTouristSpotSite');

Route::post('/admin/tourist_spot/edit', 'adminTouristSpotController@editTouristSpot');

Route::post('/admin/tourist_spot/upload_image', 'adminTouristSpotController@uploadImageToSpot');

########################################################################################################

Route::get('/admin/tourist_info/add_new/{spot_id}', 'adminTouristSpotInfoController@addSpotInformationSite');

Route::post('/admin/tourist_info/add_new', 'adminTouristSpotInfoController@addSpotInformation');

Route::get('/admin/tourist_info/{spot_id}/{language}', 'adminTouristSpotInfoController@spotInfoShow');

Route::post('/admin/tourist_info/edit', 'adminTouristSpotInfoController@spotInfoEdit');