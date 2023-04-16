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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





 
// Route::post('user/register', 'APIRegisterController@register');

// Route::post('user/login', 'APILoginController@login');
Route::post('/user/register', 'App\Http\Controllers\APIRegisterController@register');

// Route::post('user/register' , [App\Http\Controller\APIRegisterController::class , 'register']);
// Route::post('/register'  , 'APIRegisterController@register');
// // Route::post('/login', 'APILoginController@Login');