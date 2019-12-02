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
    Route::post('manage-articles/add', 'modules\ArticleController@add');