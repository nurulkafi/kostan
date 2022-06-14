<?php

use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\MediaPembayaranController;
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
