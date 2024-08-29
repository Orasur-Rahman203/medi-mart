<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SslCommerzPaymentController;

// Route::get('/backend_dashboard', function () {
//     return view('backend.master');
// });

Route::get('/', function () {
    return view('auth.login');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controller::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//backend route

//category route
Route::get('/backend_dashboard',[FrontendHomeController::class,'home'])->name('backend_dashboard');

Route::prefix('category')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index',[CategoryController::class,'index'])->name('category_index');
    Route::get('/create',[CategoryController::class,'create'])->name('category_create');
    Route::post('/store',[CategoryController::class,'store'])->name('category_store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category_edit');
    Route::post('/update/{id}',[CategoryController::class,'update'])->name('category_update');
    Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('category_delete');
});

//medicine route

Route::prefix('medicine')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index',[MedicineController::class,'index'])->name('medicine_index');
    Route::get('/create',[MedicineController::class,'create'])->name('medicine_create');
    Route::post('/store',[MedicineController::class,'store'])->name('medicine_store');
    Route::get('/edit/{id}',[MedicineController::class,'edit'])->name('medicine_edit');
    Route::post('/update/{id}',[MedicineController::class,'update'])->name('medicine_update');
    Route::get('/delete/{id}',[MedicineController::class,'delete'])->name('medicine_delete');
});

//vendor route

Route::prefix('vendor')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index',[VendorController::class,'index'])->name('vendor_index');
    Route::get('/create',[VendorController::class,'create'])->name('vendor_create');
    Route::post('/store',[VendorController::class,'store'])->name('vendor_store');
    Route::get('/edit/{id}',[VendorController::class,'edit'])->name('vendor_edit');
    Route::post('/update/{id}',[VendorController::class,'update'])->name('vendor_update');
    Route::get('/delete/{id}',[VendorController::class,'delete'])->name('vendor_delete');
});

//order route

Route::prefix('order')->group(function () {
    Route::get('/index',[OrderController::class,'index'])->name('order_index');
    Route::get('/create',[OrderController::class,'create'])->name('order_create');
    Route::post('/store',[OrderController::class,'store'])->name('order_store');
    Route::get('/edit/{id}',[OrderController::class,'edit'])->name('order_edit');
    Route::post('/update/{id}',[OrderController::class,'update'])->name('order_update');
    Route::get('/delete/{id}',[OrderController::class,'delete'])->name('order_delete');
});


//cart route

Route::prefix('cart')->group(function () {
    Route::get('/index',[CartController::class,'index'])->name('cart_index');
    Route::get('/create',[CartController::class,'create'])->name('cart_create');
    Route::post('/store',[CartController::class,'store'])->name('cart_store');
    Route::get('/edit/{id}',[CartController::class,'edit'])->name('cart_edit');
    Route::post('/update/{id}',[CartController::class,'update'])->name('cart_update');
    Route::get('/delete/{id}',[CartController::class,'delete'])->name('cart_delete');
    
});

//company route

Route::prefix('company')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index',[CompanyController::class,'index'])->name('company_index');
    Route::get('/create',[CompanyController::class,'create'])->name('company_create');
    Route::post('/store',[CompanyController::class,'store'])->name('company_store');
    Route::get('/edit/{id}',[CompanyController::class,'edit'])->name('company_edit');
    Route::post('/update/{id}',[CompanyController::class,'update'])->name('company_update');
    Route::get('/delete/{id}',[CompanyController::class,'delete'])->name('company_delete');
});


//slider route

Route::prefix('slider')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index',[SliderController::class,'index'])->name('slider_index');
    Route::get('/create',[SliderController::class,'create'])->name('slider_create');
    Route::post('/store',[SliderController::class,'store'])->name('slider_store');
    Route::get('/edit/{id}',[SliderController::class,'edit'])->name('slider_edit');
    Route::post('/update/{id}',[SliderController::class,'update'])->name('slider_update');
    Route::get('/delete/{id}',[SliderController::class,'delete'])->name('slider_delete');
});


//user list route
Route::get('/user_list',[ProfileController::class,'userList'])->middleware(['auth', 'admin'])->name('user_list');


Route::get('/search',[SearchController::class,'medicine_search'])->middleware(['auth', 'user'])->name('search');
Route::get('/get',[SearchController::class,'medicine']);
// Route::get('/f_search',[SearchController::class,'f_medicine_search'])->name('f_search');


//Frontend Route
// Route::get('/f_master', function () {
//     return view('frontend.master');
// });

Route::get('/home',[FrontendHomeController::class,'home'])->name('frontend_home');
Route::get('/about',[FrontendHomeController::class,'about'])->middleware(['auth', 'user'])->name('frontend_about');
Route::get('/f_shop/{id}',[FrontendHomeController::class,'shop'])->middleware(['auth', 'user'])->name('frontend_shop');
Route::get('/contact',[FrontendHomeController::class,'contact'])->middleware(['auth', 'user'])->name('frontend_contact');
Route::get('/cart_item_list', [FrontendHomeController::class, 'cartItems'])->middleware(['auth', 'user'])->name('cart_items');
Route::get('/item_edit/{id}',[FrontendHomeController::class,'item_edit'])->middleware(['auth', 'user'])->name('item_edit');
Route::post('/item_update/{id}',[FrontendHomeController::class,'item_update'])->middleware(['auth', 'user'])->name('item_update');


Route::get('/product_details/{id}',[FrontendHomeController::class,'product'])->middleware(['auth', 'user'])->name('frontend_product');

Route::get('/f_checkout',[FrontendHomeController::class,'checkout'])->middleware(['auth', 'user'])->name('frontend_checkout');
Route::get('/f_myAccount',[FrontendHomeController::class,'myAccount'])->middleware(['auth', 'user'])->name('frontend_myAccount');

Route::post('/add_comment',[FrontendHomeController::class,'add_comment'])->middleware(['auth', 'user'])->name('add_comment');
Route::post('/add_reply',[FrontendHomeController::class,'add_reply'])->middleware(['auth', 'user'])->name('add_reply');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END