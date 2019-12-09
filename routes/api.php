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
Route::get('article', 'api\article\ArticleController@index');

// Manage-event
Route::get('event', 'api\event\EventController@index');

// Manage-event
Route::get('info', 'api\info\InfoController@index');

// Manage-event
Route::get('galery', 'api\galery\GaleryController@index');

// Manage-event
Route::get('banner-header', 'api\banner_header\BannerHeaderController@index');