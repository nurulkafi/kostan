<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function searchCity($id)
    {
        $data = Kabupaten::where('provinsi_id', $id)->pluck('title', 'code');
        return json_encode($data);
    }
}
