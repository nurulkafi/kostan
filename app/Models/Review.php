<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cek($id){
        $data = self::where('transaksi_id',$id)->get();
        return $data;
    }
}
