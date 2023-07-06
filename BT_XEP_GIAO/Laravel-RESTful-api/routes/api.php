<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;

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
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.all');
Route::get('/customers/{customerId}', [CustomerController::class, 'show'])->name('customers.show');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::put('/customers/{customerId}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customerId}', [CustomerController::class, 'destroy'])->name('customers.destroy');

// Đăng ký tài khoản mới
Route::post('/register', [AuthController::class,'register']);

// Đăng nhập và nhận mã truy cập
Route::post('/login', [AuthController::class,'login']);

// Đăng xuất
Route::post('/logout', [AuthController::class,'logout']);


