<?php

use App\Infrastructure\Controllers\{
    CompanyController,
    UserController
};
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->middleware('api')->group(function () {

    // without jwt
    Route::get('companies', CompanyController::class . '@index')->name('companies.index');
    Route::get('companies/{company}', CompanyController::class . '@show')->name('companies.show');

    // with jwt
    Route::group(['middleware' => 'jwt'], function () {

        Route::post('companies', CompanyController::class . '@store')->name('companies.store');
        Route::put('companies/{company}', CompanyController::class . '@update')->name('companies.update');
        Route::delete('companies/{company}', CompanyController::class . '@destroy')->name('companies.destroy');

        Route::apiResource('users', UserController::class);
    });

});

//
// Route::prefix('v2')->middleware('api')->group(function () {
// });
