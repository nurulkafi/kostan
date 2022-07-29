<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kostan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kostan';

    public function count(){
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $data = self::latest()->get();
        } else {
            $data = self::where('pemilik_kost_id', $pemilik_kost->id)->get();
        }
        return $data;
    }
    public function alamat()
    {
        return $this->hasOne(AlamatKost::class);
    }
    public function kabupaten($id){
        $al = AlamatKost::where('kostan_id',$id)->first();
        $kab = Kabupaten::where('code',$al->kabupaten_id)->first();
        return $kab;
    }
    public function provinsi($id)
    {
        $al = AlamatKost::where('kostan_id', $id)->first();
        $kab = Kabupaten::where('code', $al->kabupaten_id)->first();
        $prov = Provinsi::where('code',$kab->provinsi_id)->first();
        return $prov;
    }
    public function foto(){
        return $this->hasMany(FotoKost::class);
    }
}
