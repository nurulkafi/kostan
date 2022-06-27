<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Fasilitas;

class FasilitasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $fasilitas = Fasilitas::where('id', $this->fasilitas_id)->first();
        return [
            'nama' => $fasilitas->nama,
            'foto' => $fasilitas->foto
        ];
    }
}
