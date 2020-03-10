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

Route::get('/', 'home@index');

// Route::get('clear', 'clear@index');

Route::get('dbCheck', 'clear@create');

Route::match(array('GET', 'POST'),'{v}', [
    'middleware' => ['rewrite','dbCheck'],
    'uses' => 'search@index'
]);

Route::get('play/next', 'play@next');

Route::get('play/{vidId}', 'play@index');
