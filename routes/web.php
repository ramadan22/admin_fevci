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

Route::get('', 'C_dashboard@index');

// modules
    // Manage-content
    Route::get('manage-content/about', 'modules\AboutController@index');
    Route::post('manage-content/about/update', 'modules\AboutController@update');

    // Manage-article
    Route::get('manage-articles', 'modules\ArticleController@index');
    // Route::get('manage-articles/{any}', 'modules\ArticleController@index');
    Route::post('manage-articles/add', 'modules\ArticleController@add');
    Route::post('manage-articles/form-edit', 'modules\ArticleController@formEdit');
    Route::post('manage-articles/update', 'modules\ArticleController@update');
    Route::get('manage-articles/delete', 'modules\ArticleController@delete');

    // Manage-event
    Route::get('manage-event', 'modules\EventController@index');
    // Route::get('manage-event', 'modules\EventController@index');
    Route::post('manage-event/add', 'modules\EventController@add');
    Route::post('manage-event/form-edit', 'modules\EventController@formEdit');
    Route::post('manage-event/update', 'modules\EventController@update');
    Route::get('manage-event/delete', 'modules\EventController@delete');

    // Manage-info
    Route::get('manage-info', 'modules\InfoController@index');
    // Route::get('manage-info', 'modules\InfoController@index');
    Route::post('manage-info/add', 'modules\InfoController@add');
    Route::post('manage-info/form-edit', 'modules\InfoController@formEdit');
    Route::post('manage-info/update', 'modules\InfoController@update');
    Route::get('manage-info/delete', 'modules\InfoController@delete');