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
    public function fasilitas()
    {
        return $this->hasMany(DetailFasilitas::class);
    }
}
