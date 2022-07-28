<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    protected $guarded = [];
    public function kabupaten($id){
        $data = Kabupaten::where('provinsi_id',$id)->get();
        return $data;
    }
}
