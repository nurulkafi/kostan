<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kostan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kostan';

    public function alamat()
    {
        return $this->hasOne(AlamatKost::class);
    }
    public function foto(){
        return $this->hasMany(FotoKost::class);
    }
}
