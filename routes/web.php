<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DetailFasilitasController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FotoKostController;
use App\Http\Controllers\KostanController;
use App\Http\Controllers\MediaPembayaranController;
use App\Http\Controllers\TypeKamarController;
use App\Http\Controllers\KostanHomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PermisssionController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
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

Route::get('/',[LandingPageController::class,'index']);

Route::resource('/kostan',KostanHomeController::class);

Route::get('/landing', function () {
    return view('layout.index');
});

Route::get('/masuk-pemilik', function () {
    return view('login.login-pemilik');
});

Route::get('/masuk-pencari', function () {
    return view('login.login-pencari');
});

Route::get('/daftar-pemilik', [RegistrasiController::class,'daftar_pemilik_view']);
Route::post('/daftar-pemilik/register', [RegistrasiController::class, 'daftar_pemilik_post']);
Route::get('/daftar-pencari', [RegistrasiController::class, 'daftar_penyewa_view']);
Route::post('/daftar-pencari/register', [RegistrasiController::class, 'daftar_penyewa_post']);

Route::get('/admin', function () {
    return view('admin.layouts.master');
});
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

Route::resource('admin/fasilitas',FasilitasController::class);
Route::resource('admin/media_pembayaran', MediaPembayaranController::class);
Route::resource('admin/kostan', KostanController::class);
Route::resource('admin/foto_kostan', FotoKostController::class);
Route::resource('admin/type_kamar', TypeKamarController::class);
Route::resource('admin/users', UsersController::class);
Route::resource('admin/role', RoleController::class);
Route::resource('admin/permission', PermisssionController::class);
Route::delete('admin/detail_fasilitas/{id_fasilitas}/{id_tipe_kamar}', [DetailFasilitasController::class,'destroy']);
Route::delete('admin/foto_kostan/{id_foto}/{id_kostan}',[FotoKostController::class,'destroy']);
//pemilik kost
Route::resource('pemilik_kost/fasilitas', FasilitasController::class);
Route::resource('pemilik_kost/media_pembayaran', MediaPembayaranController::class);
Route::resource('pemilik_kost/kostan', KostanController::class);
Route::resource('pemilik_kost/foto_kostan', FotoKostController::class);
Route::resource('pemilik_kost/type_kamar', TypeKamarController::class);
Route::delete('pemilik_kost/detail_fasilitas/{id_fasilitas}/{id_tipe_kamar}', [DetailFasilitasController::class, 'destroy']);
Route::delete('pemilik_kost/foto_kostan/{id_foto}/{id_kostan}', [FotoKostController::class, 'destroy']);
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
Route::get('/profile', function () {
    return view('layouts.profile');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
