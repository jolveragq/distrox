<?php

use App\Infrastructure\Controllers\{
    CompanyController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('api')->group(function () {
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('users', UserController::class);
});

//
// Route::prefix('v2')->middleware('api')->group(function () {
// });
