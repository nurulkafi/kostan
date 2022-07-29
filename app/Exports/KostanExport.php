<?php

namespace App\Exports;

use App\Models\Kostan;
use App\Models\PemilikKost;
use Maatwebsite\Excel\Concerns\FromCollection;

class KostanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $data = Kostan::latest()->get();
        } else {
            $data = Kostan::where('pemilik_kost_id', $pemilik_kost->id)->get();
        }
        return $data;
    }
}
