<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $guarded = [];
    public function getCountWishlist(){
        $penyewa_id = Penyewa::where('users_id', \Auth::user()->id)->first();
        $data = self::where('penyewa_id',$penyewa_id->id)->get();
        if($data == null){
            return 0;
        }else{
            return count($data);
        }
    }
    public function wishlist(){
        $penyewa_id = Penyewa::where('users_id', \Auth::user()->id)->first();
        // $data = Self::join('type_kamar','tipe_kamar_id','=','type_kamar.id')->where('penyewa_id', $penyewa_id->id)->get();
        $data = TypeKamar::join('wishlist','type_kamar.id','=','tipe_kamar_id')->where('penyewa_id', $penyewa_id->id)->get();
        return $data;
    }
    public function is_wishlist($id)
    {
        $penyewa_id = Penyewa::where('users_id', \Auth::user()->id)->first();
        $data = Self::where('tipe_kamar_id',$id)->where('penyewa_id', $penyewa_id->id)->get();
        // $data = TypeKamar::join('wishlist', 'type_kamar.id', '=', 'tipe_kamar_id')->where('penyewa_id', $penyewa_id->id)->get();
        return $data;
    }
}
