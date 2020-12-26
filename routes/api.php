<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('auth/login', [\App\Http\Controllers\API\AuthController::class,'login']);
Route::post('auth/register', [\App\Http\Controllers\API\AuthController::class,'register']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
//user
    Route::post('logout', [\App\Http\Controllers\API\AuthController::class,'logout']);
    Route::post('refresh', [\App\Http\Controllers\API\AuthController::class,'refresh']);
    Route::post('me', [\App\Http\Controllers\API\AuthController::class,'me']);
//post
//    Route::apiResource('/products', [\App\Http\Controllers\API\PostController::class]);

});
