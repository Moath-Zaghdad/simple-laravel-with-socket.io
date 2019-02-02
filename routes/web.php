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
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    Redis::set('name', 'Moath');
    // return Redis::get('name');

    // Cache::put('foo', 'bar', 10);
    // Cache::store('redis')->put('bar', 'baz', 10);
    return Redis::get('name');
    
    // return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
