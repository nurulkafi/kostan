<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $guarded = [];
    public function type_kamar()
    {
        return $this->belongsToMany(TypeKamar::class);
    }
    public function count()
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $data = Fasilitas::latest()->get();
        } else {
            $data = Fasilitas::where('pemilik_kost_id', $pemilik_kost->id)->get();
        }
        return $data;
    }
}
