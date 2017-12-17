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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checkauth', 'Controller@checkAuth');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/query', 'Controller@query');

    Route::resource('topics', 'TopicController');

    Route::resource('tasks', 'TaskController');
});



