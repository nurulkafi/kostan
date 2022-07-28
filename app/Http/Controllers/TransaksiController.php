<?php

namespace App\Http\Controllers;

use App\Models\PemilikKost;
use App\Models\Transaksi;
use App\Models\TypeKamar;
use DateTime;
use Illuminate\Http\Request;
use PDF;

class TransaksiController extends Controller
{
    //
    public function index($status){
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if (!$user->hasRole("admin|staff")) {
            if ($status == "menunggu_konfirmasi") {
                $data = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                ->select('transaksis.*','kostan.pemilik_kost_id')
                ->where('pemilik_kost_id', $pemilik_kost->id)
                ->where('status',Transaksi::Menunggu_pemilik)
                ->get();
            }
            if($status == "transaksi_dibatalkan"){
                $data = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                 ->select('transaksis.*','kostan.pemilik_kost_id')
                ->where('pemilik_kost_id', $pemilik_kost->id)
                ->where('keterangan', '!=',null)
                ->get();
            }
            if ($status == "transaksi_selesai") {
                $data = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                 ->select('transaksis.*','kostan.pemilik_kost_id')
                    ->where('pemilik_kost_id', $pemilik_kost->id)
                    ->where('status', Transaksi::Terkonfirmasi)
                    ->get();
            }
            if ($status == "update_jumlah_kamar") {
                $data = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                 ->select('transaksis.*','kostan.pemilik_kost_id')
                    ->where('pemilik_kost_id', $pemilik_kost->id)
                    ->whereColumn('tanggal_sewa', 'tanggal_berakhir')
                    ->get();
            }
            if($status == "all"){
                $data = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                 ->select('transaksis.*','kostan.pemilik_kost_id')
                ->where('pemilik_kost_id', $pemilik_kost->id)
                ->where('status', '!=', Transaksi::Menunggu_pembayaran)
                ->get();
            }
        }else{
            if($status == "menunggu_konfirmasi"){
                $data = Transaksi::where('status',Transaksi::Menunggu_verif)->orderBy('updated_at','DESC')->get();
            }
            if($status == "pengembalian_dana"){
                $data = Transaksi::where('keterangan', 'Pengembalian Dana Sedang Diproses')->orderBy('updated_at', 'DESC')->get();
            }
            if($status == "all"){
                $data = Transaksi::orderBy('updated_at', 'DESC')->get();
            }
        }

        return view('admin.transaksi.index',compact('data','status'));
    }
    public function pdf()
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if (!$user->hasRole("admin|staff")) {
                $data = Transaksi::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                ->select('transaksis.*', 'kostan.pemilik_kost_id')
                ->where('pemilik_kost_id', $pemilik_kost->id)
                    ->where('status', '!=', Transaksi::Menunggu_pembayaran)
                    ->get();
        } else {
                $data = Transaksi::orderBy('updated_at', 'DESC')->get();
        }
        $pdf = PDF::loadView('admin.transaksi.pdf', ['data' => $data]);
        return $pdf->setPaper('a4', 'landscape')->setWarnings(false)->download('transaksi' . date('d-m-Y') . '_.pdf');
    }
    //acc admin
    public function verifikasi_admin($id,request $request){
        $data = Transaksi::findOrFail($id);
        if ($request->button == "verifikasi") {
            $data->update([
                'status' => Transaksi::Menunggu_pemilik,
            ]);
        }else if($request->button = "pengembalian_dana"){
            $data->update([
                'keterangan' => "Pengembalian Dana Sudah Diproses",
            ]);
        }
        else{
            if($request->keterangan == "pembayaran tidak masuk"){
                $data->update([
                    'status' => Transaksi::Tolak . $request->keterangan,
                    'keterangan' => '-'
                ]);
            }else{
                $data->update([
                    'status' => Transaksi::Tolak . $request->keterangan,
                    'keterangan' => "Pengembalian Dana Sudah Selesai!"
                ]);
            }
        }
            # code...
        return redirect('admin/transaksi/all')->with('message', 'Successfully');
    }
    public function verifikasi_pemilik_kost($id,request $request)
    {
        $data = Transaksi::findOrFail($id);
        $typekamar = TypeKamar::findOrFail($data->tipe_kamar_id);
        if ($request->button == "terima") {
            date_default_timezone_set('Asia/Jakarta');

            $date = new DateTime('now');
            $tgl_mulai = $date->format('Y-m-d');

            $date->modify('+' . $data->lama_sewa . 'month');
            $tgl_berakhir = $date->format('Y-m-d');
            $data->update([
                'status' => Transaksi::Terkonfirmasi,
                'tanggal_sewa' => $tgl_mulai,
                'tanggal_berakhir' => $tgl_berakhir,
            ]);
            Transaksi::update_jumlah_kamar($typekamar->id);
        }else{
            $data->update([
                'status' => Transaksi::Tolak.$request->keterangan,
                'keterangan' => "Pengembalian Dana Sedang Diproses"
            ]);
        }
        return redirect('pemilik_kost/transaksi/all')->with('message', 'Successfully');
    }
    public function show($id){

        $data = Transaksi::findOrFail($id);
        $user = \Auth::user();
        if ($user->hasRole("admin|staff")) {
            return view('admin.transaksi.detail_admin',compact('data'));
        }else{
            return view('admin.transaksi.detail_pemilik', compact('data'));
        }
    }
}
