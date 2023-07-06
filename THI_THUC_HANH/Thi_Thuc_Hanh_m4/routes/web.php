<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpendingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [SpendingController::class, 'index'])->name('spendings.index');
Route::get('/create', [SpendingController::class, 'create'])->name('spendings.create');
Route::post('/store', [SpendingController::class, 'store'])->name('spendings.store');
Route::get('/show/{id}', [SpendingController::class, 'show'])->name('spendings.show');
Route::get('/edit/{id}', [SpendingController::class, 'edit'])->name('spendings.edit');
Route::put('/update/{id}', [SpendingController::class, 'update'])->name('spendings.update');
Route::delete('/destroy/{id}', [SpendingController::class, 'destroy'])->name('spendings.destroy');
Route::get('/search', [SpendingController::class, 'search'])->name('spendings.search');
