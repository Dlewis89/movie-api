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

/**
 * Movie Routes
 */
Route::controller(MovieController::class)
    ->prefix('v1/movies')
    ->group(function() {
        Route::get('', 'index');
        Route::get('{movie:id}', 'show');
        Route::post('', 'store');
        Route::patch('{movie:id}','update');
        Route::delete('{movie:id}', 'destroy');
    }
);
