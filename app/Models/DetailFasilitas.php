<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFasilitas extends Model
{
    use HasFactory;
    protected $table = 'detail_fasilitas';
    protected $guarded = [];
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
