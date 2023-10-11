<?php

use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'type'], function () {
    Route::get('', [TypeController::class, 'index']);
    Route::post('store', [TypeController::class, 'store']);
    Route::put('{model}', [TypeController::class, 'update']);
    Route::get('{model}', [TypeController::class, 'show']);
    Route::delete('{model}', [TypeController::class, 'destroy']);

    // Route::get('staffs', [AdminController::class, 'staffs']);

});
