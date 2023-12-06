<?php

use App\Http\Controllers\Public\MasterDataController;
use Illuminate\Support\Facades\Route;


Route::get('/master-data', MasterDataController::class);

