<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController; 
use App\Http\Controllers\AuthController; 

use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\AdminAuthController;

use App\Http\Controllers\ChekoutController;




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
    return view('template.main');
});



// Route::get('/admin', function () {
//     return view('admin.login');
// });

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/register', function(){
    return view('auth.register');
});

Route::post('/register/store', [AuthController::class, 'store']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

// Route::resource('cart', CartController::class);
// Route::post('addcart', [CartController::class, 'store'])->name('addcart');

Route::resource('cart', 'App\Http\Controllers\CartController');
Route::post('addcart', 'App\Http\Controllers\CartController@store' );
// Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::resource('chekout', 'App\Http\Controllers\ChekoutController');


});


Route::resource('product', 'App\Http\Controllers\ProductController');

Route::resource('about', 'App\Http\Controllers\AboutController');

Route::resource('customer', 'App\Http\Controllers\CustomerAuthController');

// Route::get('/shop/{idkategori}', [ShopController::class, 'showByCategory']);
// Route::get('/shop', [ShopController::class, 'index']);

// Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::resource('contact', 'App\Http\Controllers\ContactController');

Route::resource('shop', 'App\Http\Controllers\ShopController');

// Route::resource('chekout', 'App\Http\Controllers\ChekoutController');
// // Route::post('chekout', 'App\Http\Controllers\CartController@showCheckoutPage' );
// Route::post('checkout', [ChekoutController::class, 'showCheckoutPage'])->name('checkout');

// Route::resource('cust', 'App\Http\Controllers\CustomerController');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('satuan', 'App\Http\Controllers\SatuanController');
Route::get('deleteSatuan/{id}', 'App\Http\Controllers\SatuanController@deleteSatuan');

Route::resource('kategori', 'App\Http\Controllers\KategoriController');
// Route::get('/shop',  'App\Http\Controllers\KategoriController@deleteKategori');
Route::get('deleteKategori/{id}', 'App\Http\Controllers\KategoriController@deleteKategori');

Route::resource('pemasok', 'App\Http\Controllers\PemasokController');
Route::get('deletePemasok/{id}', 'App\Http\Controllers\PemasokController@deletePemasok');

Route::resource('stok', 'App\Http\Controllers\StokController');
Route::get('deleteStok/{id}', 'App\Http\Controllers\StokController@deleteStok');

Route::resource('jual', 'App\Http\Controllers\JualController');
Route::get('deleteJual/{id}', 'App\Http\Controllers\JualController@deleteJual');

Route::resource('beli', 'App\Http\Controllers\BeliController');
Route::get('deleteBeli/{id}', 'App\Http\Controllers\BeliController@deleteBeli');

Route::resource('pelanggan', 'App\Http\Controllers\PelangganController');
Route::get('deletePelanggan/{id}', 'App\Http\Controllers\PelangganController@deletePelanggan');

Route::resource('kontak', 'App\Http\Controllers\KontakController');
Route::get('deleteKontak/{id}', 'App\Http\Controllers\KontakController@deleteKontak');

Route::resource('mutasi', 'App\Http\Controllers\MutasiController');
Route::get('deleteMutasi/{id}', 'App\Http\Controllers\MutasiController@deleteMutasi');




