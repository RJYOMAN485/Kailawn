<?php

use App\Http\Controllers\SchoolAdmin\SchoolAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

   //SCHOOL ADMIN
   Route::group([
    'prefix' => 'school-admin'
    //uncomment below line while testing
    , 'middleware' => ['schooladmin']
], function () {
    Route::get('', [SchoolAdminController::class, 'index']);
    Route::put('{model}', [SchoolAdminController::class, 'update']);
    Route::get('admissions', [SchoolAdminController::class, 'getAdmissions']);
    Route::put('admission/{model}', [SchoolAdminController::class, 'updateAdmission']);
});

