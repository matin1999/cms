<?php

use App\Models\Post;
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


Route::get('/', 'PostController@index')->name('home');

//posts rout

Route::group(['middleware' =>'auth'], function()
{
    Route::resource('/posts', 'PostController');
    Route::post('/users/{post}','PostController@draft')->name('post.draft');
});

//tags
Route::resource('/tags','TagController')->only('index','show');

//Categories
Route::resource('/categories','CategoryController')->only('index','show');

//auth , login ,register , logout
Route::group([
    'prefix' => 'auth',
],function (){
    Route::get('register/{mobile}', 'AuthController@showRegister')->name('show.register');
    Route::post('register', 'AuthController@register')->name('register');

    Route::get('login', 'AuthController@showLogin')->name('login');
    Route::post('login', 'AuthController@mobile')->name('mobile');
//  Route::get('verify', 'AuthController@addpass')->name('add.pass');
    Route::post('verify', 'AuthController@VerifyPassAndLogin')->name('verify.pass');
    Route::post('verifycode', 'AuthController@verifyCode')->name('verify.code');

    Route::post('logout', 'AuthController@logout')->name('logout');
}
);
//admin routes user controling
Route::group(['prefix' => 'admin',  'middleware' =>'auth'], function()
{
    Route::resource('/users','AdminController');
    Route::post('/users/{user}','AdminController@deactive')->name('users.deactive');
});

//User dashbord
Route::group(['middleware' =>'auth'], function()
{
    Route::get('/dashbord','UserDashbordController@index')->name('dashbord');

    Route::get('/user/{user}','UserDashbordController@UserPost')->name('user.post');
    Route::post('/posts/{post}','UserDashbordController@terminate')->name('posts.restore');
    Route::post('/posts/{post}','UserDashbordController@restore')->name('posts.restore');


});
