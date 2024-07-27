<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;

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
// */
// Route::get('/', function () {
//     return view('Frontend.welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route:: get('/view_details/{id}', [HomeController::class,'view_details'])->name('Frontend.pages.view_details');
Route:: get('/product_by_cat/{cat_id}', [HomeController::class,'product_by_cat'])->name('Frontend.pages.product_by_cat');
Route:: get('/product_by_subcat/{subcat_id}', [HomeController::class,'product_by_subcat'])->name('Frontend.pages.product_by_subcat');

//for add to cart
Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('Frontend.pages.add_to_cart');

//delete-cart
Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('Frontend.pages.delete_cart');

//checkout

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('Frontend.checkout');
Route::get('/logincheck', [CheckoutController::class, 'logincheck'])->name('Frontend.pages.logincheck');

//customer Login
Route::post('/customer_login', [CustomerController::class, 'customer_login'])->name('Frontend.pages.customer_login');

//customer Registration
Route::post('/customer_register', [CustomerController::class, 'customer_register'])->name('Frontend.pages.customer_register');
Route::get('/customer_logout', [CustomerController::class, 'customer_logout'])->name('Frontend.pages.customer_logout');

//shiping
Route::post('/save_shipping_details', [CheckoutController::class, 'save_shipping_details'])->name('Frontend.pages.save_shipping_details');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('Frontend.pages.payment');


//Dashboard route
Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::get ('/logout', [LoginController::class,'logout'])->name('logout');
Route::post ('/authenticate', [LoginController::class,'authenticate'])->name('authenticate');
Route::post ('/process-register', [LoginController::class,'processRegister'])->name('processRegister');
Route::get ('/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/register', [LoginController::class,'register'])->name('register');

//category route
Route::resource('category', CategoryController::class);
Route::get('/changestatus/{category}', [CategoryController::class, 'change_Status'])->name('changeStatus');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

//subcategory route
Route::resource('subcategory', SubCategoryController::class);
Route::get('/change-status/{subcategory}', [SubcategoryController::class, 'change_Status'])->name('Subcategory.change_Status');

//brand related
Route::resource('brand', BrandController::class);
Route::get('/brand-status/{brand}', [BrandController::class, 'brand_Status'])->name('brand_Status');

//Unit related
Route::resource('unit', UnitController::class);
Route::get('/unit_Status/{unit}', [UnitController::class, 'unit_Status'])->name('unit_Status');

//Size related
Route::resource('size', SizeController::class);
Route::get('/size_Status/{size}', [SizeController::class, 'size_Status'])->name('size_Status');

//color related
Route::resource('color', ColorController::class);
Route::get('/color_Status/{color}', [ColorController::class, 'color_Status'])->name('color_Status');

//product related
Route::resource('product', ProductController::class);
Route::get('/product_Status/{product}', [ProductController::class, 'product_Status'])->name('product.product_Status');


