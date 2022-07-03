<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikKost extends Model
{
    use HasFactory;
    protected $table = 'pemilik_kost';
    protected $guarded = [];
}
