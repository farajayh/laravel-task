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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'middleware' => ['api'],
    'namespace' => 'App\Http\Controllers'
], function(){
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/subscribe/{user}/{site}', [UserController::class, 'subscribe']);
    /*Route::get('/subscribe/{user}/{site}', function ($user, $site) {
        return response()->json([
            'user' => $user,
            'site' => $site
            ], 
        200);
    });*/
    Route::get('/users', function () {
        return response()->json(['message' => 'hello'], 200);
    });
});

Route::fallback(function(){
    return response()->json([
        'error' => 'Invalid endpoint'
    ], 404);
});