<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\AuthCustomerController; 
use App\Http\Controllers\AuthAdminController; 

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


Route::resource('product', 'App\Http\Controllers\ProductController');

Route::resource('about', 'App\Http\Controllers\AboutController');

// Route::resource('customer', 'App\Http\Controllers\CustomerAuthController');

Route::resource('contact', 'App\Http\Controllers\ContactController');

Route::resource('shop', 'App\Http\Controllers\ShopController');


// Route::resource('jual', 'App\Http\Controllers\JualController');
// Route::get('deleteJual/{id}', 'App\Http\Controllers\JualController@deleteJual');


Route::get('/auth/customers', [AuthCustomerController::class, 'index'])->name('login.customers');
Route::post('/auth/customers', [AuthCustomerController::class, 'authenticate']);
Route::get('/auth/customers/register', [AuthCustomerController::class, 'register']);
Route::post('/auth/customers/register', [AuthCustomerController::class, 'registerStore']);
Route::post('logout', [AuthCustomerController::class, 'logout'])->name('logout');

Route::group(
    [
        'middleware' => ['auth.customers', 'hak_akses:customers'],
    ],
    function () {

        Route::resource('cart', 'App\Http\Controllers\CartController');
        Route::post('addcart', 'App\Http\Controllers\CartController@store');
        Route::resource('chekout', 'App\Http\Controllers\ChekoutController');

            // Route::get('logout', function() {
            // Auth::logout();
            // return redirect('/');
            // })->name('logout');
}
);


Route::get('/auth/admin', [AuthAdminController::class, 'index'])->name('login.admin');
Route::post('/auth/admin', [AuthAdminController::class, 'authenticate']);
Route::get('/auth/admin/register', [AuthAdminController::class, 'register']);
Route::post('/auth/admin/register', [AuthAdminController::class, 'registerStore']);
Route::get('/logout', [AuthAdminController::class, 'logout']);

Route::group(['middleware' => ['auth.admin', 'hak_akses:admin'],],function () {
    Route::get('/welcome', function () {
            return view('welcome');
        });

Route::resource('satuan', 'App\Http\Controllers\SatuanController');
Route::get('deleteSatuan/{id}', 'App\Http\Controllers\SatuanController@deleteSatuan');

Route::resource('kategori', 'App\Http\Controllers\KategoriController');
Route::get('deleteKategori/{id}', 'App\Http\Controllers\KategoriController@deleteKategori');

Route::resource('pemasok', 'App\Http\Controllers\PemasokController');
Route::get('deletePemasok/{id}', 'App\Http\Controllers\PemasokController@deletePemasok');

Route::resource('stok', 'App\Http\Controllers\StokController');
Route::get('deleteStok/{id}', 'App\Http\Controllers\StokController@deleteStok');

Route::resource('beli', 'App\Http\Controllers\BeliController');
Route::get('deleteBeli/{id}', 'App\Http\Controllers\BeliController@deleteBeli');

Route::resource('penjualan', 'App\Http\Controllers\PenjualanController');

Route::resource('pelanggan', 'App\Http\Controllers\PelangganController');
Route::get('deletePelanggan/{id}', 'App\Http\Controllers\PelangganController@deletePelanggan');

Route::resource('kontak', 'App\Http\Controllers\KontakController');
Route::get('deleteKontak/{id}', 'App\Http\Controllers\KontakController@deleteKontak');

Route::resource('mutasi', 'App\Http\Controllers\MutasiController');
Route::get('deleteMutasi/{id}', 'App\Http\Controllers\MutasiController@deleteMutasi');

        // Route::get('/logout', [AuthAdminController::class, 'logout']);
    }
);


// Route::middleware(['auth'])->group(function () {

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::resource('satuan', 'App\Http\Controllers\SatuanController');
// Route::get('deleteSatuan/{id}', 'App\Http\Controllers\SatuanController@deleteSatuan');

// Route::resource('kategori', 'App\Http\Controllers\KategoriController');
// Route::get('deleteKategori/{id}', 'App\Http\Controllers\KategoriController@deleteKategori');

// Route::resource('pemasok', 'App\Http\Controllers\PemasokController');
// Route::get('deletePemasok/{id}', 'App\Http\Controllers\PemasokController@deletePemasok');

// Route::resource('stok', 'App\Http\Controllers\StokController');
// Route::get('deleteStok/{id}', 'App\Http\Controllers\StokController@deleteStok');

// Route::resource('beli', 'App\Http\Controllers\BeliController');
// Route::get('deleteBeli/{id}', 'App\Http\Controllers\BeliController@deleteBeli');

// Route::resource('pelanggan', 'App\Http\Controllers\PelangganController');
// Route::get('deletePelanggan/{id}', 'App\Http\Controllers\PelangganController@deletePelanggan');

// Route::resource('kontak', 'App\Http\Controllers\KontakController');
// Route::get('deleteKontak/{id}', 'App\Http\Controllers\KontakController@deleteKontak');

// Route::resource('mutasi', 'App\Http\Controllers\MutasiController');
// Route::get('deleteMutasi/{id}', 'App\Http\Controllers\MutasiController@deleteMutasi');

// });
