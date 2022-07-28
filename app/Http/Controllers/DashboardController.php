<?php

namespace App\Http\Controllers;

use App\Models\Kostan;
use App\Models\PemilikKost;
use App\Models\Review;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $year = date("Y");
            for ($i = 1; $i <= 12; $i++) {
                # code...
                $result = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                    ->where('status', Transaksi::Terkonfirmasi)
                    ->whereBetween('transaksis.created_at', [$year . '-' . $i . '-01 00:00:00', $year . '-' . $i . '-31 23:59:59'])
                    ->sum('jumlah_pembayaran');
                $pendapatan[] = $result;
            }
            for ($j = 1; $j <= 12; $j++) {
                # code...
                $result2 = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                    ->where('status', Transaksi::Terkonfirmasi)
                    ->whereBetween('transaksis.created_at', [$year . '-' . $j . '-01 00:00:00', $year . '-' . $j . '-31 23:59:59'])
                    ->get();
                $total_sewa[] = count($result2);
            }
            $data = Kostan::latest()->get();
            $review = Review::join('transaksis','transaksis.id','=','reviews.transaksi_id')
                        ->join('type_kamar','type_kamar.id','=','transaksis.tipe_kamar_id')
                        ->join('kostan','kostan.id','=','type_kamar.kostan_id')
                        ->join('penyewa','penyewa.id','=','transaksis.penyewa_id')
                        ->select('penyewa.nama as penyewa','kostan.nama as kostan','type_kamar.nama as tipe'
                                ,'reviews.*','penyewa.foto')
                        ->get();
        } else {
                $year = date("Y");
                for ($i = 1; $i <= 12; $i++) {
                    # code...
                    $result = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                    ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                    ->where('status', Transaksi::Terkonfirmasi)
                        ->where('pemilik_kost_id', $pemilik_kost->id)
                        ->whereBetween('transaksis.created_at', [$year . '-' . $i . '-01 00:00:00', $year . '-' . $i . '-31 23:59:59'])
                        ->sum('jumlah_pembayaran');
                    $pendapatan [] = $result;
                }
                for ($j = 1; $j <= 12; $j++) {
                    # code...
                    $result2 = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                        ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                        ->where('status', Transaksi::Terkonfirmasi)
                        ->where('pemilik_kost_id', $pemilik_kost->id)
                        ->whereBetween('transaksis.created_at', [$year . '-' . $j . '-01 00:00:00', $year . '-' . $j . '-31 23:59:59'])
                        ->get();
                    $total_sewa[] = count($result2);
                }
            $data = Kostan::where('pemilik_kost_id', $pemilik_kost->id)->get();
            $review = Review::join('transaksis', 'transaksis.id', '=', 'reviews.transaksi_id')
            ->join('type_kamar', 'type_kamar.id', '=', 'transaksis.tipe_kamar_id')
            ->join('kostan', 'kostan.id', '=', 'type_kamar.kostan_id')
            ->join('penyewa', 'penyewa.id', '=', 'transaksis.penyewa_id')
            ->select(
                'penyewa.nama as penyewa',
                'kostan.nama as kostan',
                'type_kamar.nama as tipe',
                'reviews.*',
                'penyewa.foto'
            )
            ->where('kostan.pemilik_kost_id',$pemilik_kost->id)
            ->get();

        }
        return view('admin.dashboard_pemilik_kost', compact('data', 'pendapatan', 'total_sewa','review'));
    }
}
