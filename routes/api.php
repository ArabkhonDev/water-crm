<?php

use App\Http\Controllers\API\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/user', function (Request $request) {return $request->user();});

    Route::apiResources([
        'customers'=> CustomerController::class,
    ]);
});

