<?php

namespace App\Exports;

use App\Models\Kostan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TypeKamarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kostan::all();
    }
}
