<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;





Route::get('/test', function () {
    return view('test');
});

Route::post('/test/employees', [EmployeeController::class, 'store'])->name('test.employees.store');
Route::post('/test/transactions', [TransactionController::class, 'store'])->name('test.transactions.store');
Route::get('/test/payments', [PaymentController::class, 'index'])->name('test.payments.index');
Route::post('/test/payments/pay', [PaymentController::class, 'pay'])->name('test.payments.pay');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

// Route::post('/test/employees', [EmployeeController::class, 'store'])->name('test.employees.store');
// Route::post('/test/transactions', [TransactionController::class, 'store'])->name('test.transactions.store');
// Route::get('/test/payments', [PaymentController::class, 'index'])->name('test.payments.index');
// Route::post('/test/payments/pay', [PaymentController::class, 'pay'])->name('test.payments.pay');

require __DIR__ . '/api.php';