<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/youtube/', 'home@index');

// Route::get('clear', 'clear@index');

Route::get('dbCheck', 'clear@create');

Route::match(array('GET', 'POST'),'/youtube/{v}', [
    'middleware' => ['rewrite','dbCheck'],
    'uses' => 'search@index'
]);

Route::get('/youtube/play/next', 'play@next');

Route::get('/youtube/play/{vidId}', 'play@index');
