<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Kostan;
use App\Models\AlamatKost;
use App\Models\FotoKost;
use App\Models\Kabupaten;
class RekomendasiKostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $kostan     = Kostan::where('id', $this->kostan_id)->first();
        $alamat     = AlamatKost::where('kostan_id', $kostan->id)->first();
        $kabupaten  = Kabupaten::where('id', $alamat->kabupaten_id)->first();
        $foto       = FotoKost::where('kostan_id', $kostan->id)->first();
        return [
            'nama'      => $this->nama .' ('.$kostan->nama.')',
            'alamat'    => $alamat->alamat_lengkap,
            'kabupaten' => $kabupaten->title,
            'harga'     => 'Rp.' . number_format($this->harga, 0, ',', '.'),
            'gender'    => $kostan->gender,
            'foto'      => $foto->path,
        ];
    }
}
