<?php

namespace App\Http\Resources;
use App\Http\Resources\FasilitasResource;

use App\Models\DetailFasilitas;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeKamarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nama'          => $this->nama,
            'ukuran_kamar'  => $this->ukuran_kamar,
            'peraturan'     => $this->peraturan,
            'harga'         => $this->harga,
            'jumlah_kamar'  => $this->jumlah_kamar,
            'fasilitas'     => FasilitasResource::collection(DetailFasilitas::where('type_kamar_id', $this->id)->orderBy('created_at', 'desc')->get()),
        ];
    }
}
