<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailFasilitasController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FotoKostController;
use App\Http\Controllers\KostanController;
use App\Http\Controllers\MediaPembayaranController;
use App\Http\Controllers\TypeKamarController;
use App\Http\Controllers\KostanHomeController;
use App\Http\Controllers\LandingPage\HomeController;
use App\Http\Controllers\LandingPage\KostanController as LandingPageKostanController;
use App\Http\Controllers\LandingPage\ReviewsController;
use App\Http\Controllers\LandingPage\SewaKostController;
use App\Http\Controllers\LandingPage\TransaksiController as LandingPageTransaksiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermisssionController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransaksiController;
use App\Models\Kostan;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/kostan', [LandingPageKostanController::class, 'index']);
Route::get('/kostan/terbaru',[LandingPageKostanController::class,'terbaru']);
Route::get('/kostan/detail/{slug}', [LandingPageKostanController::class, 'detail']);
Route::get('/kostan/harga/rendah-tinggi', [LandingPageKostanController::class, 'low_to_high']);
Route::get('/kostan/harga/tinggi-rendah', [LandingPageKostanController::class, 'high_to_low']);
Route::get('/kostan/harga/{harga1}/{harga2}', [LandingPageKostanController::class, 'price']);
Route::get('/kostan/gender/{gender}', [LandingPageKostanController::class, 'gender']);
Route::get('/kostan/kota/{kota}', [LandingPageKostanController::class, 'kota']);
Route::get('/kostan/kota', [LandingPageKostanController::class, 'list_kota']);
Route::post('/kostan/search', [LandingPageKostanController::class, 'search']);
Route::get('/kostan/search/{search}', [LandingPageKostanController::class, 'searching']);

Route::get('/search',[KostanHomeController::class, 'search']);

Route::resource('/profile',ProfileController::class);


Route::get('/masuk-pemilik', function () {
    return view('login.login-pemilik');
});

Route::get('/masuk-pencari', function () {
    return view('login.login-pencari');
});
Route::get('/403_error', function () {
    return view('admin.error.403');
});
Route::post('/sewa_kost',[SewaKostController::class,'proses'])->middleware('auth');
Route::post('/reviews/{id}', [ReviewsController::class, 'proses'])->middleware('auth');
Route::get('/pembayaran/{id}', [SewaKostController::class, 'form'])->middleware('auth');
Route::post('/pembayaran/cancel/{id}', [SewaKostController::class, 'cancel'])->middleware('auth');
Route::post('/bukti_pembayaran/{id}', [SewaKostController::class, 'upload_bukti'])->middleware('auth');

Route::get('/daftar-pemilik', [RegistrasiController::class,'daftar_pemilik_view']);
Route::post('/daftar-pemilik/register', [RegistrasiController::class, 'daftar_pemilik_post']);
Route::get('/daftar-pencari', [RegistrasiController::class, 'daftar_penyewa_view']);
Route::post('/daftar-pencari/register', [RegistrasiController::class, 'daftar_penyewa_post']);
Route::post('/wishlist/{id}',[HomeController::class,'wishlist'])->middleware('auth');
Route::post('/wishlist/delete/{id}', [HomeController::class, 'hapus_wishlist'])->middleware('auth');
Route::post('/wishlist/deletes/{id}', [HomeController::class, 'hapus_wishlist2'])->middleware('auth');

Route::get('admin/login', function () {
    return view('admin.login');
});

// Route::get('/', function () {
//     // return view('welcome');
//     return view('layouts.home');
// });
Route::get('/home', function () {
    // return view('welcome');
    return view('layouts.home');
});
//admin staff
Route::group(['middleware' => ['auth','role:admin|staff']],
    function () {
    Route::prefix('/admin')->group(
        function () {
            Route::resource('/fasilitas', FasilitasController::class);
            Route::resource('/media_pembayaran', MediaPembayaranController::class);
            Route::resource('/kostan', KostanController::class);
             Route::get('/dashboard', [DashboardController::class, 'index']);
            Route::get('/kostan/cetak/pdf', [KostanController::class,'pdf']);
            Route::get('/kostan/cetak/excel', [KostanController::class, 'excel']);
            Route::resource('/foto_kostan', FotoKostController::class);
            Route::resource('/type_kamar', TypeKamarController::class);
            Route::get('/type_kamar/cetak/pdf', [TypeKamarController::class,'pdf']);
            Route::get('/type_kamar/cetak/excel', [TypeKamarController::class, 'excel']);
            Route::resource('/users', UsersController::class);
            Route::resource('/role', RoleController::class);
            Route::resource('/permission', PermisssionController::class);
            Route::get('/transaksi/{status}', [TransaksiController::class,'index']);
            Route::get('/transaksi/cetak/pdf', [TransaksiController::class,'pdf']);
            Route::get('/transaksi/detail/{id}', [TransaksiController::class,'show']);
            Route::post('/transaksi/{id}', [TransaksiController::class, 'verifikasi_admin']);
            Route::delete('/detail_fasilitas/{id_fasilitas}/{id_tipe_kamar}', [DetailFasilitasController::class, 'destroy']);
            Route::delete('/foto_kostan/{id_foto}/{id_kostan}', [FotoKostController::class, 'destroy']);
    });
});
// Route::get('transaksi/{id}', [TransaksiController::class, 'show']);
//pemilik kost
Route::group(
    ['middleware' => ['auth','role:pemilik-kost']],
    function () {
        Route::prefix('/pemilik_kost')->group(
            function () {
            Route::resource('/fasilitas', FasilitasController::class);
            Route::resource('/media_pembayaran', MediaPembayaranController::class);
            Route::resource('/kostan', KostanController::class);
            Route::get('/kostan/cetak/pdf', [KostanController::class,'pdf']);
            Route::get('/dashboard', [DashboardController::class,'index']);
            Route::get('/kostan/cetak/excel', [KostanController::class, 'excel']);
            Route::resource('/foto_kostan', FotoKostController::class);
            Route::resource('/type_kamar', TypeKamarController::class);
                Route::get('/transaksi/cetak/pdf', [TransaksiController::class, 'pdf']);
            Route::get('/type_kamar/cetak/pdf', [TypeKamarController::class, 'pdf']);
            Route::get('/type_kamar/cetak/excel', [TypeKamarController::class, 'excel']);
            Route::get('/transaksi/{status}', [TransaksiController::class, 'index']);
            Route::get('/transaksi/detail/{id}', [TransaksiController::class, 'show']);
            Route::post('/transaksi/{id}', [TransaksiController::class,'verifikasi_pemilik_kost']);
            Route::delete('/detail_fasilitas/{id_fasilitas}/{id_tipe_kamar}', [DetailFasilitasController::class, 'destroy']);
            Route::delete('/foto_kostan/{id_foto}/{id_kostan}', [FotoKostController::class, 'destroy']);
        });
});

Route::get('province/search/{id}', [Controller::class, 'searchCity']);

// Route::get('/', function () {
//     return view('layouts.detail');
// });
Route::get('/detail', function () {
    return view('layouts.detail');
});

Route::get('/bukti-pembayaran', function () {
    return view('layouts.bukti_pembayaran');
});
Route::resource('/transaksi', LandingPageTransaksiController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
