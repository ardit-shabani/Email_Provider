<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group([

    'prefix'=>'provider',
    'middleware' =>'auth'], function (){

    Route::resource('email','EmailProviderController');

    Route::get('/scheduled', 'EmailProviderController@scheduledMails')->name('scheduled');
});



Route::get('/home', 'HomeController@index')->name('home');

