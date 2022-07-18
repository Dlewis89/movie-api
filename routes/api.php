<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

Route::group(['prefix' => 'v1'], function() {
    Route::get('movies', [MovieController::class, 'index']);
    Route::get('movies/{movie:id}', [MovieController::class, 'show']);
    Route::post('movies', [MovieController::class, 'store']);
    Route::post('movies/{movie:id}', [MovieController::class, 'update']);
    Route::delete('movies/{movie:id}', [MovieController::class, 'destroy']);
});
