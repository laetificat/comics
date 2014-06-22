<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('admin', function()
{
    return View::make('backend.index');
});

Route::get('search', function() {
    return View::make('frontend.search');
});
Route::get('search/{query}', 'ComicController@search');

Route::resource('read', 'ComicController@show');

Route::resource('upload', 'ComicController@store');

Route::resource('browse', 'ComicController@index');

Route::resource('edit', 'ComicController@edit');

Route::resource('delete', 'ComicController@destroy');

Route::resource('feature', 'ComicController@feature');

Route::resource('report', 'ComicController@report');
