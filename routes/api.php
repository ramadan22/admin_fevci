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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Manage-content -> aboutus
Route::get('about', 'api\about\AboutController@index');

// Manage-article
Route::post('article', 'api\article\ArticleController@index');

// Manage-event
Route::post('event', 'api\event\EventController@index');

// Manage-info
Route::post('info', 'api\info\InfoController@index');

// Manage-info
Route::post('merchandise', 'api\merchandise\MerchandiseController@index');

// Manage-galery
Route::post('galery', 'api\galery\GaleryController@index');

// Manage-banner-header
Route::post('banner-header', 'api\banner_header\BannerHeaderController@index');
Route::get('banner-header/default', 'api\banner_header\BannerHeaderController@default');

// Manage-register
Route::post('register', 'api\register\RegisterController@index');