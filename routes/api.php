<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', 'VideoCatalogController@getAllVideos');

Route::get('/stats', 'VideoCatalogController@getStats');
Route::get('/list-home-videos', 'VideoCatalogController@getListHomeVideo');
Route::get('/list-videos-categories', 'VideoCatalogController@getListCategoryVideo');


Route::get('/details', 'VideoController@details');

Route::get('/videos', 'VideoCatalogController@getAllVideos');

Route::get('/videos-jazzy', 'VideoCatalogController@getVideosJazzy');
//Route::get('/latest-videos', 'VideoController@getLatestVideos');

Route::get('/latest-videos-jazzy', 'VideoCatalogController@getLatestVideosJazzy');

Route::get('/videos-ambient', 'VideoCatalogController@getVideosAmbient');
Route::get('/videos-rock', 'VideoCatalogController@getLatestVideosRock');
Route::get('/videos-ambient-meditate', 'VideoCatalogController@getVideosAmbientMeditate');

Route::get('/latest-videos-ambient', 'VideoCatalogController@getLastestVideosAmbient');


Route::get('/videos-lofi', 'VideoCatalogController@getVideosLofi');
Route::get('/latest-videos-lofi', 'VideoCatalogController@getLatestVideosLofi');
Route::get('/videos-lofi-house', 'VideoCatalogController@getVideosLofiHouse');

Route::get('/videos-regional', 'VideoRegionalController@getVideosRegional');
Route::get('/videos-regional-spanish', 'VideoRegionalController@getVideosRegionalSpanish');
Route::get('/videos-regional-italy', 'VideoRegionalController@getVideosRegionalItaly');
Route::get('/videos-regional-japan', 'VideoRegionalController@getVideosRegionalJapan');
Route::get('/videos-regional-indian', 'VideoRegionalController@getVideosRegionalIndian');
Route::get('/videos-regional-france', 'VideoRegionalController@getVideosRegionalFrance');
Route::get('/videos-regional-chinese', 'VideoRegionalController@getVideosRegionalChinese');
Route::get('/videos-regional-arabic', 'VideoRegionalController@getVideosRegionalArabic');
Route::get('/videos-regional-african', 'VideoRegionalController@getVideoRegionalAfrican');

Route::get('/videos-chillstep', 'VideoCatalogController@getVideosChillStep');

Route::get('/latest-videos-chillstep', 'VideoCatalogController@getLatestChillStep');


Route::get('/videos-chillout', 'VideoCatalogController@getVideosChillOut');
Route::get('/videos-chillout-gaming', 'VideoCatalogController@getVideosChillOutGaming');

Route::get('/latest-videos-chillout', 'VideoCatalogController@getLatestChillOut');

Route::get('videos-down', 'VideoCatalogController@getDown');
Route::get('videos-trap', 'VideoCatalogController@getTrap');
Route::get('videos-techno', 'VideoCatalogController@getTechno');
Route::get('videos-world', 'VideoCatalogController@getWorld');
Route::get('videos-lounge', 'VideoCatalogController@getLounge');
Route::get('videos-classical', 'VideoCatalogController@getClassical');
Route::get('videos-classic', 'VideoCatalogController@getClassic');

Route::get('/channels', 'ChannelController@getChannels');

Route::get('/watch/{videoId}', 'VideoController@getVideo');
Route::get('/watch-chillhop/{videoId}', 'VideoController@getVideoChillHop');

Route::group(['prefix' => 'admin'], function () {
    Route::post('/add-video', 'VideoController@addVideo');

    Route::get('/videos', 'Admin\VideoController@getVideos');
    Route::get('/categories', 'Admin\VideoController@getCategories');

    Route::post('/add-channel-videos', 'ChannelController@addChannelVideos');
});

Route::group(['prefix' => 'suggest'], function () {
    Route::post('/add-video', 'VideoController@addVideoQuest');
});



Route::group(['prefix' => 'admin'], function () {
    Route::post('/update-video', 'VideoController@updateVideo');
});

//Route::get('/contact', 'VideoController@getVideos');

//Route::get('/donate', 'VideoController@getVideos');

Route::post('auth/login', 'Auth\LoginController@login');

Route::get('me', 'Auth\MeController@getMe')->middleware('auth:api');

Route::post('auth/logout', 'Auth\LogoutController@logout');

Route::post('/register', 'Auth\RegisterController@postRegister');

Route::post('/search', 'SearchController@searchVideo');

Route::get('/categories', 'CategoryController@getCategories');
Route::get('/categories/{name}', 'CategoryController@currentCategoriesWithName');
Route::post('/category', 'CategoryController@postCategory');
Route::get('/subcategories-with-category/{id}', 'SubCategoryController@getSubCategoryWithCategory');
Route::post('/subcategory', 'SubCategoryController@postSubCategory');

Route::get('/playlists', 'PlaylistController@getPublicPlaylist');
Route::get('/playlists/{slug}', 'PlaylistController@getPlaylistbySlug');
Route::get('/playlists/pilot', 'PlaylistController@getPilot');
Route::post('/playlists', 'PlaylistController@createPublicPlaylist');
Route::post('/add-to-playlists', 'PlaylistController@addVideoToPlaylist');

Route::post('/contact', 'ContactController@contactUSPost');


Route::get('/', function () {
    return view('welcome');
});

Route::post('/search-elastic', 'SearchController@searchWithElastic')->middleware('throttle:9999999,1');

Route::post('/tag', 'TagController@getTagVideos');

Route::post('/tag/get-videos', 'TagController@getVideos');

//Auth
Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/user', 'Auth\MeController@getMe');
    });

    Route::delete('/delete-video/{id}', 'VideoController@deleteVideo');

    Route::post('/save-category-to-video', 'VideoController@saveCategoryToVideo');

    Route::post('/save-user-categories', 'VideoController@saveUserCategories');
});

Route::get('/social-login/facebook', 'SocialLoginController@fbLogin');

Route::get('/social-login/facebook/callback', 'SocialLoginController@fbCallback');

Route::post('/admin/playlist/add', 'Admin\VideoController@savePlaylist');
Route::get('/admin/playlist/{id}', 'Admin\VideoController@getPlaylistById');
Route::post('/admin/playlist/{id}/edit', 'Admin\VideoController@updatePlaylist');

Route::get('/admin/playlists', 'Admin\VideoController@getPlaylists');
