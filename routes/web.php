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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('', 'C_dashboard@index' , function () {  })->middleware('auth');

// login
// Route::get('login', 'Auth\LoginController@index');

// logout
Route::get('logout', 'Auth\LoginController@logout');

// modules
    // Manage-content
        // About us
        Route::get('manage-content/about', 'modules\AboutController@index');
        Route::post('manage-content/about/update', 'modules\AboutController@update');
        // Banner-header
        Route::get('manage-content/banner-header', 'modules\BannerHeaderController@index');
        Route::post('manage-content/banner-header/form-edit', 'modules\BannerHeaderController@formEdit');
        Route::post('manage-content/banner-header/update', 'modules\BannerHeaderController@update');
        Route::get('manage-content/banner-header/update-use-default', 'modules\BannerHeaderController@updateUseDefault');

    // Manage-article
    Route::get('manage-articles', 'modules\ArticleController@index');
    Route::post('manage-articles/add', 'modules\ArticleController@add');
    Route::post('manage-articles/form-edit', 'modules\ArticleController@formEdit');
    Route::post('manage-articles/update', 'modules\ArticleController@update');
    Route::get('manage-articles/delete', 'modules\ArticleController@delete');

    // Manage-event
    Route::get('manage-event', 'modules\EventController@index');
    Route::post('manage-event/add', 'modules\EventController@add');
    Route::post('manage-event/form-edit', 'modules\EventController@formEdit');
    Route::post('manage-event/update', 'modules\EventController@update');
    Route::get('manage-event/delete', 'modules\EventController@delete');

    // Manage-info
    Route::get('manage-info', 'modules\InfoController@index');
    Route::post('manage-info/add', 'modules\InfoController@add');
    Route::post('manage-info/form-edit', 'modules\InfoController@formEdit');
    Route::post('manage-info/update', 'modules\InfoController@update');
    Route::get('manage-info/delete', 'modules\InfoController@delete');

    // Manage-galery
    Route::get('manage-galery', 'modules\GaleryController@index');
    Route::post('manage-galery/add', 'modules\GaleryController@add');
    Route::post('manage-galery/form-edit', 'modules\GaleryController@formEdit');
    Route::post('manage-galery/update', 'modules\GaleryController@update');
    Route::get('manage-galery/delete', 'modules\GaleryController@delete');

    // Manage-register
    Route::get('manage-register', 'modules\RegisterController@index');

// Config
Route::get('config', 'config\ConfigController@index');

Auth::routes();