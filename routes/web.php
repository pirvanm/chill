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

Route::get('/chanel-videos', 'VideoController@getVideoOfChannels');


Route::get('/chanel-search', 'VideoController@searchVideo');

Route::get('/list-home-videos', 'VideoController@getListHomeVideo');
Route::get('/videos', 'VideoController@getVideos');
Route::get('/videos-jazzy', 'VideoController@getVideosJazzy');
Route::get('/videos-ambient', 'VideoController@getVideosAmbient');
Route::get('/latest-videos-jazzy', 'VideoController@getLatestVideosJazzy');
Route::get('/videos-lofi', 'VideoController@getVideosLofi');
Route::get('/latest-videos-lofi', 'VideoController@getVideosLofi');
Route::get('/videos-regional', 'VideoController@getVideosRegional');

Route::get('/test', 'VideoController@videoTest');
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
Route::post('/sendCat/', 'VideoController@getCat');
Route::get('/getCat/', 'VideoController@getCat');

//Route::post('/add-emails', 'VideoController@emails');
