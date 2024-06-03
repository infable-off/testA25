<?php

use App\Http\Controllers\ApiController;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;


use Illuminate\Support\Facades\Route;


Route::apiResource('employees', EmployeeController::class);
Route::post('transactions', [TransactionController::class, 'store']);
Route::get('payments', [PaymentController::class, 'index']);
Route::post('payments/pay', [PaymentController::class, 'pay']);




Route::apiResources([
    'data' => ApiController::class,
]);