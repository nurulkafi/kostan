<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DetailFasilitasController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FotoKostController;
use App\Http\Controllers\KostanController;
use App\Http\Controllers\MediaPembayaranController;
use App\Http\Controllers\TypeKamarController;
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

Route::get('/', function () {
    return view('admin.layouts.master');
});

Route::resource('admin/fasilitas',FasilitasController::class);
Route::resource('admin/media_pembayaran', MediaPembayaranController::class);
Route::resource('admin/kostan', KostanController::class);
Route::resource('admin/foto_kostan', FotoKostController::class);
Route::resource('admin/type_kamar', TypeKamarController::class);
Route::delete('admin/detail_fasilitas/{id_fasilitas}/{id_tipe_kamar}', [DetailFasilitasController::class,'destroy']);
Route::delete('admin/foto_kostan/{id_foto}/{id_kostan}',[FotoKostController::class,'destroy']);
Route::get('province/search/{id}', [Controller::class, 'searchCity']);

