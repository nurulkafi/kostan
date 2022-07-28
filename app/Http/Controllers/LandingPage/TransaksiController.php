<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Penyewa;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index(){
        $penyewa_id = Penyewa::where('users_id', \Auth::user()->id)->first();
        $belum_bayar = Transaksi::where('penyewa_id',$penyewa_id->id)->where('status',Transaksi::Menunggu_pembayaran)->get();
        $menunggu = Transaksi::where('penyewa_id', $penyewa_id->id)->where('status', Transaksi::Menunggu_verif)->orWhere('status', Transaksi::Menunggu_pemilik)->get();
        $terkonfirmasi = Transaksi::where('penyewa_id', $penyewa_id->id)->where('status', Transaksi::Terkonfirmasi)->get();
        $dibatalkan = Transaksi::where('penyewa_id', $penyewa_id->id)->where('status', 'like','%'. Transaksi::Tolak .'%')->get();
        return view('landing_pages.transaksi.index',compact('belum_bayar','menunggu','terkonfirmasi', 'dibatalkan'));
    }
}
