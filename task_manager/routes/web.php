<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
//Admin
use App\Http\Controllers\Admin\CustomerController;
//Web
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController as WebUserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin
Route::group([
    'prefix' => 'customers'
],function(){
    Route::get('/',[CustomerController::class,'index'])->name('customers.index');
    Route::get('create',[CustomerController::class,'create'])->name('customers.create');
    Route::post('/',[CustomerController::class,'store'])->name('customers.store');
    Route::get('/{id}',[CustomerController::class,'show'])->name('customers.show');
    Route::get('/{id}/edit',[CustomerController::class,'edit'])->name('customers.edit');
    Route::put('/{id}',[CustomerController::class,'update'])->name('customers.update');
    Route::delete('/{id?}',[CustomerController::class,'destroy'])->name('customers.destroy');
});

// Route::resource('customers',UserController::class);
Route::resource('users',UserController::class);
Route::resource('products',ProductController::class);
Route::resource('categorys',CategoryController::class);
Route::resource('orders',OrderController::class);


// Web
Route::get('/', HomeController::class);
Route::get('login', [WebUserController::class,'login']);
Route::get('category/{name}', [WebUserController::class,'category']);
Route::get('product/{name}', [WebUserController::class,'product']);
Route::get('cart', [WebUserController::class,'cart']);
Route::post('carthandling', [WebUserController::class,'carthandling']);
Route::get('contact', [WebUserController::class,'contact']);
Route::post('contacthandling', [WebUserController::class,'contacthandling']);
Route::get('pay', [WebUserController::class,'pay']);
Route::post('payhandling', [WebUserController::class,'payhandling']);


