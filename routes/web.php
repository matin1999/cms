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
//post

Route::resource('/posts', 'PostController')->only('index');

//auth , login ,register , logout
Route::group([
    'prefix' => 'auth',
],function (){
    Route::get('register', 'AuthController@showRegister')->name('show.register');
    Route::post('register/{mobile}', 'AuthController@register')->name('register');

    Route::get('login', 'AuthController@showLogin')->name('login');
    Route::post('login', 'AuthController@mobile')->name('mobile');
//  Route::get('verify', 'AuthController@addpass')->name('add.pass');
    Route::post('verify', 'AuthController@verifyPass')->name('verify.pass');
    Route::post('verifycode', 'AuthController@verifyCode')->name('verify.code');

    Route::post('logout', 'AuthController@logout')->name('logout');
}
);
//admin route
Route::group(['prefix' => 'admin',  'middleware' =>'auth'], function()
{
    Route::resource('/users','AdminController');
});
