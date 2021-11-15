<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers'
], function(){
    Route::post('/post', [PostController::class, 'store']);
    Route::get('/users/{user}/subscribe/{site}', [UserController::class, 'subscribe']);
});

Route::fallback(function(){
    return response()->json([
        'error' => 'Invalid endpoint'
    ], 404);
});