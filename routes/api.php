<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Education\EducationCategoryController;
use App\Http\Controllers\Education\GradeController;
use App\Http\Controllers\Education\HomeTuitionController;
use App\Http\Controllers\Education\SchoolController;
use App\Http\Controllers\Education\TuitionCenterController;
use App\Http\Controllers\Medical\MedicalController;
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
    Route::get('subjects/{subject}', [HomeTuitionController::class, 'showBySubject']);
});


Route::group(['prefix' => 'education/tuition-center'], function () {
    Route::get('', [TuitionCenterController::class, 'index']);
    Route::get('{model}', [TuitionCenterController::class, 'show']);
    Route::get('grade/{grade}', [TuitionCenterController::class, 'showByGrade']);
    Route::get('subjects/{subject}', [TuitionCenterController::class, 'showBySubject']);
});

Route::group(['prefix' => 'education/school'], function () {
    Route::get('', [SchoolController::class, 'index']);
    Route::get('{model}', [SchoolController::class, 'show']);
    Route::get('grade/{grade}', [SchoolController::class, 'showByGrade']);
    Route::get('subjects/{subject}', [SchoolController::class, 'showBySubject']);
    Route::get('{school}/subjects', [SchoolController::class, 'getSubjectOffer']);
    Route::get('{school}/admission/subjects', [SchoolController::class, 'getAvailableAdmission']);
    Route::post('{school}/admission/store', [SchoolController::class, 'storeAdmission'])->middleware('auth:sanctum');
});


Route::group(['prefix' => 'auth/user'], function () {
    Route::post('register', [UserAuthController::class, 'register']);
    Route::post('login', [UserAuthController::class, 'login']);
    Route::post('update', [UserAuthController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::post('logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');


});

Route::group(['prefix' => 'auth/user','middleware' => ['auth:sanctum']], function () {
    Route::get('admission', [UserController::class, 'getUserAdmission']);
});
Route::group(['prefix' => 'education/grade'], function () {
    Route::get('', [GradeController::class, 'index']);
    Route::get('{model}', [GradeController::class, 'show']);
});

//MEDICAL
Route::group(['prefix' => 'medical'], function () {
    Route::get('', [MedicalController::class, 'index']);
    Route::get('{model}', [MedicalController::class, 'show']);
    Route::get('specilization/{id}', [MedicalController::class, 'showBySpecialization']);
    Route::post('{model}/clinic-booking', [MedicalController::class, 'bookClinic']);
    Route::get('payment/response-handler/{booking}', [MedicalController::class, 'paymentCallback']);
});


