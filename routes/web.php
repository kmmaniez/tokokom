<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/products');
});

Route::get('/dashboard', function () {
    $totaluser      = User::all()->count();
    $totalproduct   = Product::all()->count();
    $totaltrans     = Transaksi::all()->count();
    return view('admin.dashboard',[
        'totaluser'     => $totaluser,
        'totalproduct'  => $totalproduct,
        'totaltrans'    => $totaltrans
    ]);
});

//  login user
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// login admin
Route::get('/loginadmin', [AdminController::class, 'index']);

//  register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//  transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'store']);

// profil
Route::get('/profile', function () {
    return view('profile');
});

// cart
Route::get('products', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


// ROUTE ADMIN USER
Route::prefix('users')->group(function () {
    Route::get('/list-user', [AdminController::class, 'listUsers'])->name('listuser');
    Route::get('/create-user', [AdminController::class, 'createUser']);
    Route::post('/create-user', [AdminController::class, 'simpanUser']);
    Route::get('/edit-user/{user}', [AdminController::class, 'editUser']);
    Route::put('/edit-user/{user}', [AdminController::class, 'updateUser']);
    Route::delete('/delete-user/{user}', [AdminController::class, 'deleteUser']);
});
// ROUTE ADMIN PRODUCT
Route::prefix('product')->group(function () {
    Route::get('/list-product', [AdminController::class, 'listProducts'])->name('listproduct');
    Route::get('/create-product', [AdminController::class, 'createProduct']);
    Route::post('/create-product', [AdminController::class, 'simpanProduct']);
    Route::get('/edit-product/{product}', [AdminController::class, 'editProduct']);
    Route::put('/edit-product/{product}', [AdminController::class, 'updateProduct']);
    Route::delete('/delete-product/{product}', [AdminController::class, 'deleteProduct']);
});
// ROUTE ADMIN TRANS
Route::prefix('transaksi')->group(function () {
    Route::get('/list-transaksi', [AdminController::class, 'listTransaksis'])->name('listtrans');
    Route::get('/create-transaksi', [AdminController::class, 'createTransaksi']);
    Route::post('/create-transaksi', [AdminController::class, 'simpanTransaksi']);
    Route::get('/edit-transaksi/{transaksi}', [AdminController::class, 'editTransaksi']);
    Route::put('/edit-transaksi/{transaksi}', [AdminController::class, 'updateTransaksi']);
    Route::delete('/delete-transaksi/{transaksi}', [AdminController::class, 'deleteTransaksi']);
});