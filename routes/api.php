<?php

use App\Http\Controllers\Admin\BeautyController as AdminBeautyController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\MedicalController as AdminMedicalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TransportController as AdminTransportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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
use App\Http\Controllers\MedicalAdmin\MedicalAdminController;
use App\Http\Controllers\SchoolAdmin\SchoolAdminController;
use App\Http\Controllers\Transport\CounterController;
use App\Http\Controllers\Transport\RentalController;
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


Route::group(['prefix' => 'auth/user'], function () {
    Route::post('register', [UserAuthController::class, 'register']);
    Route::post('login', [UserAuthController::class, 'login']);
    Route::post('update', [UserAuthController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::post('logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'auth/user', 'middleware' => ['auth:sanctum']], function () {
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
        // ->middleware('auth:sanctum')
    ;

    Route::get('rental', [RentalController::class, 'index']);
    Route::get('rental/{model}', [RentalController::class, 'show']);
});


//ADMIN API


//AUTH
Route::group(['prefix' => 'super/auth'], function () {
    Route::post('login', [\App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->middleware('superadmin');
});

Route::group([
    'prefix' => 'super'
    //uncomment below line while testing
    // , 'middleware' => ['superadmin']
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
