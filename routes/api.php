<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Beauty\BeautyController;
use App\Http\Controllers\Education\EducationCategoryController;
use App\Http\Controllers\Education\GradeController;
use App\Http\Controllers\Education\HomeTuitionController;
use App\Http\Controllers\Education\SchoolController;
use App\Http\Controllers\Education\TuitionCenterController;
use App\Http\Controllers\Medical\MedicalController;
use App\Http\Controllers\Transport\CounterController;
use App\Http\Controllers\Transport\RentalController;
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


//EDUCATION
Route::group(['prefix' => 'education'], function () {
    Route::get('', [EducationCategoryController::class, 'index']);
});

Route::group(['prefix' => 'education/home-tuition'], function () {
    Route::get('', [HomeTuitionController::class, 'index']);
    Route::get('{model}', [HomeTuitionController::class, 'show']);
    Route::get('grade/{grade}', [HomeTuitionController::class, 'showByGrade']);
    Route::get('subject/{subject}', [HomeTuitionController::class, 'showBySubject']);
});

Route::group(['prefix' => 'education/tuition-center'], function () {
    Route::get('', [TuitionCenterController::class, 'index']);
    Route::get('{model}', [TuitionCenterController::class, 'show']);
    Route::get('grade/{grade}', [TuitionCenterController::class, 'showByGrade']);
    Route::get('subject/{subject}', [TuitionCenterController::class, 'showBySubject']);
});

Route::group(['prefix' => 'education/school'], function () {
    Route::get('', [SchoolController::class, 'index']);
    Route::get('{model}', [SchoolController::class, 'show']);
    Route::get('grade/{grade}', [SchoolController::class, 'showByGrade']);
    Route::get('subject/{subject}', [SchoolController::class, 'showBySubject']);
    Route::get('{school}/subjects', [SchoolController::class, 'getSubjectOffer']);
    Route::get('{school}/admission/subjects', [SchoolController::class, 'getAvailableAdmission']);
    Route::post('{school}/admission/store', [SchoolController::class, 'storeAdmission'])
        //please uncomment middleware
        ->middleware('auth:sanctum');
    ;
});

//USER
Route::group(['prefix' => 'auth/user'], function () {
    Route::post('register', [UserAuthController::class, 'register']);
    Route::post('login', [UserAuthController::class, 'login']);
    Route::post('update', [UserAuthController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::post('logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');
});

//USER BOOKING AND ADMISSIONS
Route::group(['prefix' => 'auth/user', 'middleware' => ['auth:sanctum']], function () {
    Route::get('admissions', [UserController::class, 'getUserAdmission']);
    Route::get('bookings', [UserController::class, 'getUserBookings']);
    Route::get('counter-bookings', [UserController::class, 'getUserCounterBookings']);
});
Route::group(['prefix' => 'education/grade'], function () {
    Route::get('', [GradeController::class, 'index']);
    Route::get('{model}', [GradeController::class, 'show']);
});

//MEDICAL
Route::group(['prefix' => 'medical'], function () {
    Route::get('', [MedicalController::class, 'index']);
    Route::get('{model}', [MedicalController::class, 'show']);
    Route::get('specialization/{id}', [MedicalController::class, 'showBySpecialization']);
    Route::post('{model}/clinic-booking', [MedicalController::class, 'bookClinic'])
        //uncomment below
        // ->middleware('auth:sanctum')
    ;
    Route::get('payment/response-handler/{booking}', [MedicalController::class, 'paymentCallback']);
});

//BEAUTY
Route::group(['prefix' => 'beauty'], function () {
    Route::get('', [BeautyController::class, 'index']);
    Route::get('{model}', [BeautyController::class, 'show']);
    Route::post('{model}/booking', [BeautyController::class, 'bookBeauty'])->middleware('auth:sanctum');
    Route::get('payment/response-handler/{booking}', [BeautyController::class, 'paymentCallback']);
});


//TRANSPORT
Route::group(['prefix' => 'transport'], function () {

    //search by counter name,destination,booking_date
    Route::get('counter', [CounterController::class, 'index']);
    Route::post('counter/{model}/booking', [CounterController::class, 'storeBooking'])
        //uncomment this line
        ->middleware('auth:sanctum')
    ;
    Route::get('rental', [RentalController::class, 'index']);
    Route::get('rental/{model}', [RentalController::class, 'show']);
});


