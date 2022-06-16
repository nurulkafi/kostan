<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatKost extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'alamat_kost';
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
