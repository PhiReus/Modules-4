<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('abc/{name?}', function ($name = 'asd') {
    return 'Hello World' . $name;
});

Route::get('abc1/{name}/{age?}', function ($name = 'phi', $age = '0') {
    return 'Hello World ' . $name . ', age : ' . $age;
})->where(['name' => '[A-Za-z]+', 'age' => '[0-9]+']);

Route::group(['prefix' => 'user'], function () {
    Route::get('profile', function () {
        return redirect()->route('login');
    });
    Route::get('login', [UserController::class, 'getLogin'])->name('login');
});

//Admin
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

//User
Route::resource('users',UserController::class); 


Route::get('trangchu', function () {
    return 'day la trong chu';
});
Route::get('danhmuc/{name}', function ($name) {
    return 'Trang danh sach may tinh';
});
Route::get('sanpham/{name}', function ($name) {
    return 'Trang danh sach may tinh';
});
Route::get('giohang', function () {
    return 'day la gio hang';
});
Route::post('xulygiohang', function () {
    return 'day la gio hang';
});
Route::get('lienhe', function () {
    return 'day la lien he';
});
Route::post('xulylienhe', function () {
    return 'day la lien he';
});
Route::get('thanhtoan', function () {
    return 'day la thanh toan';
});
Route::post('xulythanhtoan', function () {
    return 'day la thanh toan';
});
