<?php

use App\Http\Controllers\MedicalAdmin\MedicalAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//MEDICAL ADMIN
Route::group([
    'prefix' => 'medical-admin'
    //uncomment below line while testing
    , 'middleware' => ['medicaladmin']
], function () {
    Route::get('', [MedicalAdminController::class, 'index']);
    Route::put('{model}', [MedicalAdminController::class, 'update']);
    Route::get('bookings', [MedicalAdminController::class, 'bookings']);
    Route::put('booking/{model}', [MedicalAdminController::class, 'updateBooking']);
});
