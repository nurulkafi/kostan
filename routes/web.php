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
//admin staff
Route::group(['middleware' => ['role:admin|staff']],
    function () {
    Route::prefix('/admin')->group(
        function () {
            Route::resource('/fasilitas', FasilitasController::class);
            Route::resource('/media_pembayaran', MediaPembayaranController::class);
            Route::resource('/kostan', KostanController::class);
            Route::resource('/foto_kostan', FotoKostController::class);
            Route::resource('/type_kamar', TypeKamarController::class);
            Route::resource('/users', UsersController::class);
            Route::resource('/role', RoleController::class);
            Route::resource('/permission', PermisssionController::class);
            Route::delete('/detail_fasilitas/{id_fasilitas}/{id_tipe_kamar}', [DetailFasilitasController::class, 'destroy']);
            Route::delete('/foto_kostan/{id_foto}/{id_kostan}', [FotoKostController::class, 'destroy']);
    });
});
//pemilik kost
Route::group(
    ['middleware' => ['role:pemilik-kost']],
    function () {
        Route::prefix('/pemilik_kost')->group(
            function () {
            Route::resource('/fasilitas', FasilitasController::class);
            Route::resource('/media_pembayaran', MediaPembayaranController::class);
            Route::resource('/kostan', KostanController::class);
            Route::resource('/foto_kostan', FotoKostController::class);
            Route::resource('/type_kamar', TypeKamarController::class);
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
Route::get('/profile', function () {
    return view('layouts.profile');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
