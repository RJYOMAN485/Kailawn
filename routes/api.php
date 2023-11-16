<?php

use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\MedicalController as AdminMedicalController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Beauty\BeautyController;
use App\Http\Controllers\Education\EducationCategoryController;
use App\Http\Controllers\Education\GradeController;
use App\Http\Controllers\Education\HomeTuitionController;
use App\Http\Controllers\Education\SchoolController;
use App\Http\Controllers\Education\TuitionCenterController;
use App\Http\Controllers\Medical\MedicalController;
use App\Http\Controllers\Transport\TransportController;
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
    Route::post('{model}/clinic-booking', [MedicalController::class, 'bookClinic'])->middleware('auth:sanctum');
    Route::get('payment/response-handler/{booking}', [MedicalController::class, 'paymentCallback']);
});



//BEAUTY
Route::group(['prefix' => 'medical'], function () {
    Route::get('', [BeautyController::class, 'index']);
    Route::get('{model}', [BeautyController::class, 'show']);
    Route::post('{model}/beauty-booking', [BeautyController::class, 'bookBeauty'])->middleware('auth:sanctum');
    Route::get('payment/response-handler/{booking}', [BeautyController::class, 'paymentCallback']);
});


//TRANSPORT
Route::group(['prefix' => 'transport'], function () {
    Route::get('', [TransportController::class, 'index']);
    Route::get('{model}', [TransportController::class, 'show']);
});


//ADMIN

//EDUCATION
Route::group(['prefix' => 'admin/education'], function () {
    Route::get('', [EducationController::class, 'index']);
    Route::get('home-tuition/{model}', [EducationController::class, 'showHomeTuition']);
    Route::get('tuition-center/{model}', [EducationController::class, 'showTuitionCenter']);
    Route::get('school/{model}', [EducationController::class, 'showSchool']);

    Route::put('home-tuition/{model}', [EducationController::class, 'updateHomeTuition']);
    Route::put('tuition-center/{model}', [EducationController::class, 'updateTuitionCenter']);
    Route::put('school/{model}', [EducationController::class, 'updateSchool']);



    Route::delete('{model}', [EducationController::class, 'destroy']);
});

//MEDICAL
Route::group(['prefix' => 'admin/medical'], function () {
    Route::get('', [AdminMedicalController::class, 'index']);
    Route::get('{model}', [AdminMedicalController::class, 'show']);
    Route::put('{model}', [AdminMedicalController::class, 'update']);
    Route::get('specilization/{id}', [AdminMedicalController::class, 'showBySpecialization']);
    Route::post('bookings', [AdminMedicalController::class, 'showBookings']);
    // Route::get('payment/response-handler/{booking}', [AdminMedicalController::class, 'paymentCallback']);
});


