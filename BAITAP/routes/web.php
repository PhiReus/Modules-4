<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\CustomerController;

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

//001-BAI1
Route::get('Product_Discount', function () {
    return view('001.baitap1.display');
});
Route::post('Product_Discount', function (Request $request) {
    $productDescription = $request->productDescription;
    $price = $request->price;
    $discountPercent = $request->discountPercent;
    $discountAmount = $price * $discountPercent * 0.1;
    // echo $discountAmount;
    // dd();
    return view('001.baitap1.show_discount_amount', compact(['discountAmount', 'productDescription', 'price', 'discountPercent']));
});
//END 001-BAI1


//001-BAI2
Route::get('tudien', function () {
    return view('001.baitap2.display');
});
Route::post('tudien', function (Request $request) {
    $tienganh = $request->input('tienganh');

    $anh = ['hello', 'goodbye', 'fuckyou'];
    $viet = ['xin chao', 'tam biet', '******'];

    $tiengviet = null;
    $index = array_search($tienganh, $anh);
    if ($index !== false) {
        $tiengviet = $viet[$index];
    }
    else{
        return "không có kết quả phù hợp";
    }
    return view('001.baitap2.show_dictionary', compact('tiengviet'));
});
//END 001-BAI2

//003-BAI1
Route::get('calculator', [CalculatorController::class, 'index'])->name('calculator.index');
Route::post('calculator', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
Route::get('customer', [CustomerController::class,'index'])->name('customer.index');



