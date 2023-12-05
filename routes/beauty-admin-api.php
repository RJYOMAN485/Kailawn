<?php

use App\Http\Controllers\BeautyAdmin\BeautyAdminController;
use App\Http\Controllers\SchoolAdmin\SchoolAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

   //SCHOOL ADMIN
   Route::group([
    'prefix' => 'beauty-admin'
    //uncomment below line while testing
    , 'middleware' => ['beautyadmin']
], function () {
    Route::get('', [BeautyAdminController::class, 'index']);
    Route::get('bookings', [BeautyAdminController::class, 'bookings']);
    Route::put('booking/{model}', [BeautyAdminController::class, 'updateBooking']);
    Route::put('{model}', [BeautyAdminController::class, 'update']);


});

