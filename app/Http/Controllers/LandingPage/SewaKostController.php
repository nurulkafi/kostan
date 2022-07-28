<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\MediaPembayaran;
use App\Models\Penyewa;
use App\Models\Transaksi;
use DateTime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SewaKostController extends Controller
{
    //
    public function proses(request $request){
        $penyewa_id = Penyewa::where('users_id', \Auth::user()->id)->first();
        $saved = Transaksi::create([
            'tipe_kamar_id' => $request->tipe_kamar_id,
            'kode_transaksi' => Transaksi::kode_transaksi(),
            'penyewa_id' => $penyewa_id->id,
            'lama_sewa' => $request->lama_sewa,
            'jumlah_pembayaran' => $request->lama_sewa* $request->harga,
            'status' => Transaksi::Menunggu_pembayaran
        ]);
        Alert::success('Transaksi', 'Transaksi Berhasil Dibuat!');
        return redirect('pembayaran/'.$saved->id);
    }
    public function cancel($id){
        $item = Transaksi::findOrFail($id)->delete();
        Alert::success('Transaksi', 'Transaksi Berhasil Dihapus!');
        return redirect('transaksi/');
    }
    public function form($id){
        $media = MediaPembayaran::get();
        $item = Transaksi::findOrFail($id);
        return view('landing_pages.sewa_kostan.form',compact('id','media','item'));
    }
    public function upload_bukti(request $request,$id){
        $request->validate(
            [
                'nama_bank' => ['required'],
                'atas_nama' => ['required'],
                'no_rekening' => ['required', 'numeric'],
                'photo' => ['required'],
            ],
            [
                'nama_bank.required' => 'Nama Bank Wajib Diisi!',
                'atas_nama.required' => 'Atas Nama Wajib Diisi!',
                'no_rekening.numeric' => 'Masukan No Rekening Yang Benar!',
                'no_rekening.required' => 'No Rekening Wajib Diisi!',
                'alamat.required' => 'Alamat Wajib Diisi!',
                'photo.required' => 'Foto Wajib Diisi!',
            ]

        );
        $transaksi = Transaksi::findOrFail($id);
        $image = $request->file('photo');
        $nama_photo = rand() . $image->getClientOriginalName();
        $image->move('images/bukti_pembayaran', $nama_photo);
        $photo = 'images/bukti_pembayaran/' . $nama_photo;
        $transaksi->update([
            'bukti_pembayaran' => $photo,
            'nama_bank_pengirim' => $request->nama_bank,
            'atas_nama_pengirim' => $request->atas_nama,
            'no_rekening_pengirim' => $request->no_rekening,
            'status' => Transaksi::Menunggu_verif
        ]);
        Alert::success('Transaksi', 'Upload bukti pembayaran berhasil!');
        return redirect('pembayaran/' . $id);
    }
}
