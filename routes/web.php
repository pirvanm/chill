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


Route::post('/details', 'VideoController@details');

Route::get('/', function () {
   
    return view('welcome');
});

Route::get('/videos', 'VideoController@getVideos');
Route::get('/videos-jazzy', 'VideoCatalogController@getVideosJazzy');
Route::get('/videos-ambient', 'VideoCatalogController@getVideosAmbient');
Route::get('/latest-videos-jazzy', 'VideoCatalogController@getLatestVideosJazzy');
Route::get('/videos-lofi', 'VideoCatalogController@getVideosLofi');
Route::get('/latest-videos-lofi', 'VideoCatalogController@getVideosLofi');
Route::get('/videos-regional', 'VideoRegionalController@getVideosRegional');

Route::get('/w/{id}', 'VideoController@getVi');

Route::get('/categories', 'VideoController@categories');

Route::get('/v', 'HomeController@index');

Route::get('/vv', 'VideoController@getVideos');

Route::get('/channels', 'ChannelController@getChannels');

Route::get('/watch/{videoId}', 'VideoController@getVideo');
Route::get('/playlist/{videoId}', 'VideoController@getPlaylist');


Route::get('/currentCategory/{videoId}', 'CategoryController@currentCategories');

Route::group(['prefix' => 'admin'], function () {
    Route::post('/add-video', 'VideoController@addVideo');
});

Route::group(['prefix' => 'suggest'], function () {
    Route::post('/add-video', 'VideoController@addVideoQuest');
});



Route::group(['prefix' => 'admin'], function () {
    Route::post('/update-video', 'VideoController@updateVideo');
});




Route::post('/ad', 'VideoController@addVideo');
