<?php

use App\Http\Controllers\BeautyAdmin\BeautyAdminController;
use App\Http\Controllers\CounterAdmin\CounterAdminController;
use App\Http\Controllers\SchoolAdmin\SchoolAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

   //SCHOOL ADMIN
   Route::group([
    'prefix' => 'counter-admin'
    //uncomment below line while testing
    , 'middleware' => ['counteradmin']
], function () {
    Route::get('', [CounterAdminController::class, 'index']);
    Route::put('{model}', [CounterAdminController::class, 'update']);
    Route::get('bookings', [CounterAdminController::class, 'bookings']);
    Route::put('booking/{model}', [CounterAdminController::class, 'updateBooking']);
});

