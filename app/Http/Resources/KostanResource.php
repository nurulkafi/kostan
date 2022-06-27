<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FotoKostResource;
use App\Http\Resources\TypeKamarResource;

use App\Models\FotoKost;
use App\Models\AlamatKost;
use App\Models\Kabupaten;
use App\Models\TypeKamar;

class KostanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $alamat     = AlamatKost::where('kostan_id', $this->id)->first();
        // $harga_dari = TypeKamar::where('kostan_id', $this->id)->min('harga')->first();
        return [
            'pemilik'   => null,
            'nama'      => $this->nama,
            'gender'    => $this->gender,
            'slug'      => $this->slug,
            'deskripsi' => $this->deskripsi,
            'alamat'    => $alamat->alamat_lengkap,
            // 'harga_dari'=> $harga_dari,
            'kabupaten' => Kabupaten::where('id', $alamat->kabupaten_id)->first(),
            'foto_kost' => FotoKostResource::collection(FotoKost::orderBy('created_at', 'asc')->get()),
            'type_kamar'=> TypeKamarResource::collection(TypeKamar::where('kostan_id', $this->id)->orderBy('created_at', 'desc')->get()),

        ];
    }
}
