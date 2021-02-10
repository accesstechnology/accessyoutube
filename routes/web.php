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

Route::get('/', 'home@index');

// Route::get('clear', 'clear@index');

Route::get('dbCheck', 'clear@create');

Route::match(array('GET', 'POST'),'/{v}', ['middleware' => ['rewrite','dbCheck'],
    'uses' => 'search@index'
]);

Route::get('/play/next', 'play@next');

Route::get('/play/{vidId}', 'play@index');

Route::get('/fullscreen/{vidId}', 'fullscreen@index');
