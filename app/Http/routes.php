<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
        'uses' => 'HomeController@register_form',
        'as'   => 'register'
    ]);
    Route::post('/', [
        'uses' => 'HomeController@register',
        'as'   => 'register.post'
    ]);
    Route::get('/game', [
        'uses' => 'HomeController@game_page',
        'as'   => 'game.page'
    ]);
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/game', [
        'uses' => 'HomeController@game_page',
        'as'   => 'game.page'
    ]);
    Route::post('/update_user', [
        'uses' => 'HomeController@update_user',
        'as'   => 'update_user'
    ]);

});
