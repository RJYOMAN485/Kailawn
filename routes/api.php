<?php

use App\Http\Controllers\Education\EducationCategoryController;
use App\Http\Controllers\Education\HomeTuitionController;
use App\Http\Controllers\Education\SchoolController;
use App\Http\Controllers\Education\TuitionCenterController;
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



Route::group(['prefix' => 'education'], function () {
    Route::get('', [EducationCategoryController::class, 'index']);
    // Route::post('store', [TypeController::class, 'store']);
    // Route::put('{model}', [TypeController::class, 'update']);
    // Route::get('{model}', [TypeController::class, 'show']);
    // Route::delete('{model}', [TypeController::class, 'destroy']);


});

Route::group(['prefix' => 'education/home-tuition'], function () {
    Route::get('', [HomeTuitionController::class, 'index']);
    Route::get('{model}', [HomeTuitionController::class, 'show']);
    Route::get('grade/{grade}', [HomeTuitionController::class, 'showByGrade']);
    Route::get('subject/{subject}', [HomeTuitionController::class, 'showByGrade']);
});


Route::group(['prefix' => 'education/tuition-center'], function () {
    Route::get('', [TuitionCenterController::class, 'index']);
    Route::get('{model}', [TuitionCenterController::class, 'show']);
    Route::get('grade/{grade}', [TuitionCenterController::class, 'showByGrade']);
    Route::get('subject/{subject}', [TuitionCenterController::class, 'showByGrade']);
});



Route::group(['prefix' => 'education/school'], function () {
    Route::get('', [SchoolController::class, 'index']);
    Route::get('{model}', [SchoolController::class, 'show']);
    Route::get('grade/{grade}', [SchoolController::class, 'showByGrade']);
    Route::get('subject/{subject}', [SchoolController::class, 'showBySubject']);
});


