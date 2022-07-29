<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded =[];

    public const Menunggu_pembayaran = 'Menunggu Pembayaran';
    public const Menunggu_verif = 'Menunggu Verifikasi Pembayaran';
    public const Menunggu_pemilik = 'Pembayaran Terkonfirmasi! Menunggu Konfirmasi Pihak Pemilik Kost';
    public const Terkonfirmasi = 'Success';
    public const Tolak = 'Sewa kost dibatalkan,karena ';

    public function countVerif(){
        $data = self::where('status' , self::Menunggu_verif)->get();
        return $data;
    }
    public function countVerifPemilik()
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        $data = self::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
        ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
        ->select('transaksis.*', 'kostan.pemilik_kost_id')
        ->where('pemilik_kost_id', $pemilik_kost->id)
            ->where('status', self::Menunggu_pemilik)
            ->get();
        return $data;
    }
    public function countPengembalian(){
        $data = self::where('keterangan', 'Pengembalian Dana Sedang Diproses')->get();
        return $data;
    }
    public function cek_status($id){
       $data = self::findOrFail($id);
       return $data;
    }
    public function kostan($id){
        $data = TypeKamar::findOrFail($id);
        $kostan = Kostan::findOrFail($data->kostan_id);
        return $kostan->nama." tipe ".$data->nama;
    }
    public function kostann($id)
    {
        $data = TypeKamar::findOrFail($id);
        $kostan = Kostan::findOrFail($data->kostan_id);
        return $kostan;
    }
    public function pemilik_kostann($id)
    {
        $data = TypeKamar::findOrFail($id);
        $kostan = Kostan::findOrFail($data->kostan_id);
        $pemilik_kost = PemilikKost::findOrFail($kostan->pemilik_kost_id);
        return $pemilik_kost;
    }
    public function tipe_kamar($id)
    {
        $data = TypeKamar::findOrFail($id);
        return $data;
    }
    public function gender($id)
    {
        $data = TypeKamar::findOrFail($id);
        $kostan = Kostan::findOrFail($data->kostan_id);
        return $kostan->gender;
    }
    public function foto_kostan($id)
    {
        $data = TypeKamar::findOrFail($id);
        $kostan = Kostan::findOrFail($data->kostan_id);
        return $kostan->foto->first()->path;
    }
    public function harga($id)
    {
        $data = TypeKamar::findOrFail($id);
        return $data->harga;
    }
    public function update_jumlah_kamar($id){
        $data = TypeKamar::findOrFail($id);
        $hasil = $data->jumlah_kamar - 1;
        $data->update([
            'jumlah_kamar' => $hasil
        ]);
    }
    public function penyewa($id){
        $data = Penyewa::findOrFail($id);
        return $data->nama;
    }
    public function transaksi_success()
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $result = self::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
            ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
            ->where('status', self::Terkonfirmasi)
                ->get();
        } else {
            $year = date("Y");
            # code...
            $result = self::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
            ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
            ->where('status', self::Terkonfirmasi)
                ->where('pemilik_kost_id', $pemilik_kost->id)
                ->get();
        }
        return $result;
    }
    public function jumlah_pendapatan(){
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $result = self::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
            ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                ->where('status', self::Terkonfirmasi)
                ->sum('jumlah_pembayaran');
        } else {
            $year = date("Y");
                # code...
                $result = self::join('type_kamar', 'tipe_kamar_id', '=', 'type_kamar.id')
                ->join('kostan', 'type_kamar.kostan_id', '=', 'kostan.id')
                ->where('status', self::Terkonfirmasi)
                    ->where('pemilik_kost_id', $pemilik_kost->id)
                    ->sum('jumlah_pembayaran');
        }
        return $result;
    }
    public function penyewaa($id)
    {
        $data = Penyewa::findOrFail($id);
        return $data;
    }
    public function total($id){
        $data = self::findOrFail($id);
        return $data->jumlah_pembayaran;
    }
    public function kode_transaksi()
    {
        $orderDate = date('Y-m-d');
        $order = self::selectRaw('MAX(kode_transaksi) as kode_transaksi')
        ->where('created_at', 'like', '%' . $orderDate . '%')
        ->first();
        $date = date('Ymd');
        if ($order != null) {
            $order = substr($order->kode_transaksi, 13, 4) + 1;
            $order = "INV/" . $date . "/" . sprintf('%04s', $order);
            return $order;
        } else {
            $order = "INV/" . $date . "/0001";
            return $order;
        }
    }
}
