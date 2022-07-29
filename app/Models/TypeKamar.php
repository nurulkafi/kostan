<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeKamar extends Model
{
    use HasFactory;
    protected $table = 'type_kamar';
    protected $guarded = [];
    public function kost($id)
    {
        $data = Kostan::findOrFail($id);
        return $data;
    }
    public function kabupaten($id)
    {
        $al = AlamatKost::where('kostan_id', $id)->first();
        $kab = Kabupaten::where('code', $al->kabupaten_id)->first();
        return $kab;
    }
    public function typekamar($id){
        $data = self::where('kostan_id',$id)->get();
        return $data;
    }
    public function kostan_terkait($id,$tipe_kamar_id)
    {
        $data = self::select('type_kamar.*')
        ->join('kostan', 'kostan.id', '=', 'kostan_id')
        ->where('pemilik_kost_id',$id)
        ->where('type_kamar.id','!=',$tipe_kamar_id)
        ->paginate(8);
        return $data;
    }
    public function fasilitas()
    {
        return $this->hasMany(DetailFasilitas::class);
    }
    public function count()
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if (!$user->hasRole("admin|staff")) {
            $data = TypeKamar::join('kostan', 'kostan_id', '=', 'kostan.id')->where('pemilik_kost_id', $pemilik_kost->id)->get();
        } else {
            $data = TypeKamar::get();
        }
        return $data;
    }
    public function sumReview($id){
        $count = Review::join('transaksis', 'transaksis.id', '=', 'reviews.transaksi_id')
        ->join('type_kamar', 'type_kamar.id', '=', 'transaksis.tipe_kamar_id')
        ->where('tipe_kamar_id', $id)
        ->get();
        if (count($count) == 0) {
           $review = 0;
        }else{
            $sum = Review::join('transaksis','transaksis.id','=','reviews.transaksi_id')
                        ->join('type_kamar','type_kamar.id','=','transaksis.tipe_kamar_id')
                        ->where('tipe_kamar_id',$id)
                        ->sum('rating');
            $review = $sum/count($count);
        }
        return $review;
    }
    public function review($id)
    {
        $data = Review::join('transaksis', 'transaksis.id', '=', 'reviews.transaksi_id')
        ->join('type_kamar', 'type_kamar.id', '=', 'transaksis.tipe_kamar_id')
        ->join('penyewa', 'penyewa.id', '=', 'transaksis.penyewa_id')
        ->where('tipe_kamar_id', $id)
        ->select('reviews.*','penyewa.nama','penyewa.foto')
        ->get();
        return $data;
    }
}
