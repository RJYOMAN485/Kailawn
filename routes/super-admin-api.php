<?php

use App\Http\Controllers\Admin\EducationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BeautyController as AdminBeautyController;
use App\Http\Controllers\Admin\MedicalController as AdminMedicalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransportController as AdminTransportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

//AUTH
Route::group(['prefix' => 'super/auth'], function () {
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->middleware('superadmin');
});

Route::group([
    'prefix' => 'super'
    // uncomment below line while testing
    , 'middleware' => ['superadmin']
], function () {
    //EDUCATION
    Route::group(['prefix' => 'education'], function () {
        Route::get('', [EducationController::class, 'index']);

        Route::get('home-tuition/{model}', [EducationController::class, 'showHomeTuition']);
        Route::put('home-tuition/{model}', [EducationController::class, 'updateHomeTuition']);
        Route::post('home-tuition/store', [EducationController::class, 'storeHomeTuition']);

        Route::get('tuition-center/{model}', [EducationController::class, 'showTuitionCenter']);
        Route::put('tuition-center/{model}', [EducationController::class, 'updateTuitionCenter']);
        Route::post('tuition-center/store', [EducationController::class, 'storeTuitionCenter']);


        Route::get('school/{model}', [EducationController::class, 'showSchool']);
        Route::put('school/{model}', [EducationController::class, 'updateSchool']);
        Route::post('school/store', [EducationController::class, 'storeSchool']);

        Route::post('assign-user-home-tuition/{model}', [EducationController::class, 'assignUserHomeTuition']);
        Route::post('assign-user-tuitin-center/{model}', [EducationController::class, 'assignUserTuitionCenter']);
        Route::post('assign-user-school/{model}', [EducationController::class, 'assignUserSchool']);

        Route::delete('{str}/{model}', [EducationController::class, 'destroy']);
    });

    //MEDICAL
    Route::group(['prefix' => 'medical'], function () {
        Route::get('', [AdminMedicalController::class, 'index']);
        Route::get('bookings', [AdminMedicalController::class, 'showBookings']);
        Route::get('booking/{model}', [AdminMedicalController::class, 'showBooking']);
        Route::get('{model}', [AdminMedicalController::class, 'show']);
        Route::put('{model}', [AdminMedicalController::class, 'update']);
        Route::post('store', [AdminMedicalController::class, 'store']);
        Route::get('specialization/{id}', [AdminMedicalController::class, 'showBySpecialization']);
        Route::post('assign-user/{model}', [AdminMedicalController::class, 'assignUser']);
        Route::delete('{model}', [AdminMedicalController::class, 'destroy']);
        // Route::get('payment/response-handler/{booking}', [AdminMedicalController::class, 'paymentCallback']);
    });

    //BEAUTY
    Route::group(['prefix' => 'beauty'], function () {
        Route::get('', [AdminBeautyController::class, 'index']);
        Route::get('bookings', [AdminBeautyController::class, 'showBookings']);
        Route::get('booking/{model}', [AdminBeautyController::class, 'showBooking']);
        Route::get('{model}', [AdminBeautyController::class, 'show']);
        Route::post('store', [AdminBeautyController::class, 'store']);
        Route::put('{model}', [AdminBeautyController::class, 'update']);
        Route::post('assign-user/{model}', [AdminBeautyController::class, 'assignUser']);
        Route::delete('{model}', [AdminBeautyController::class, 'destroy']);
    });

    //TRANSPORT
    Route::group(['prefix' => 'transport'], function () {
        Route::get('', [AdminTransportController::class, 'index']);
        Route::get('counter/{model}', [AdminTransportController::class, 'showCounter']);
        Route::get('rental/{model}', [AdminTransportController::class, 'showCounter']);

        Route::put('counter/{model}', [AdminTransportController::class, 'updateCounter']);
        Route::put('rental/{model}', [AdminTransportController::class, 'updateRental']);

        Route::post('counter/store', [AdminTransportController::class, 'storeCounter']);
        Route::post('rental/store', [AdminTransportController::class, 'storeCounter']);

        Route::post('counter/assign-user/{model}', [AdminTransportController::class, 'assignCounterUser']);
        Route::post('rental/assign-user/{model}', [AdminTransportController::class, 'assignRentalUser']);
        Route::delete('counter/{model}', [AdminTransportController::class, 'destroyCounter']);
        Route::delete('counter/{model}', [AdminTransportController::class, 'destroyRental']);
    });

    //USER
    Route::group(['prefix' => 'user'], function () {
        Route::get('', [AdminUserController::class, 'index']);
        Route::get('{model}', [AdminUserController::class, 'show']);
        Route::put('{model}', [AdminUserController::class, 'update']);
        Route::post('store', [AdminUserController::class, 'store']);
        Route::delete('{model}', [AdminUserController::class, 'destroy']);
    });

    //USER
    Route::group(['prefix' => 'role'], function () {
        Route::get('', [RoleController::class, 'index']);
        Route::get('{model}', [RoleController::class, 'show']);
        Route::put('{model}', [RoleController::class, 'update']);
        Route::post('store', [RoleController::class, 'store']);
        Route::delete('{model}', [RoleController::class, 'destroy']);
    });
});
