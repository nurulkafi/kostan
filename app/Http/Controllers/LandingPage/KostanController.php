<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\AlamatKost;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\TypeKamar;
use Illuminate\Http\Request;

class KostanController extends Controller
{
    //
    public function index(){
        $kostan = TypeKamar::where('jumlah_kamar', '>', 0)->paginate(6);
        return view('landing_pages.kostan.index', compact('kostan'));
    }
    public function detail($slug){
        $kostan = TypeKamar::where('slug',$slug)->first();
        return view('landing_pages.kostan.detail',compact('kostan'));
    }
    public function terbaru()
    {
        $kostan = TypeKamar::where('jumlah_kamar', '>', 0)->latest()->paginate(6);
        return view('landing_pages.kostan.terbaru', compact('kostan'));
    }
    public function low_to_high()
    {
        $kostan = TypeKamar::where('jumlah_kamar', '>', 0)->orderBy('harga','ASC')->paginate(6);
        return view('landing_pages.kostan.terendah', compact('kostan'));
    }
    public function high_to_low()
    {
        $kostan = TypeKamar::where('jumlah_kamar', '>', 0)->orderBy('harga', 'DESC')->paginate(6);
        return view('landing_pages.kostan.tertinggi', compact('kostan'));
    }
    public function price($harga1,$harga2){
        if($harga2 != 'plus'){
            $kostan = TypeKamar::where('jumlah_kamar', '>', 0)->whereBetween('harga', [$harga1, $harga2])->paginate(6);
        }else{
            $kostan = TypeKamar::where('jumlah_kamar', '>', 0)->where('harga','>',$harga1)->paginate(6);
        }
        $ui = 'filter_price_'.$harga1.'_'.$harga2;
        return view('landing_pages.kostan.harga', compact('kostan','ui'));
    }
    public function gender($gender){
        $kostan = TypeKamar::join('kostan','kostan.id','=','kostan_id')->where('jumlah_kamar', '>', 0)->where('gender',$gender)->select('type_kamar.*')->paginate(6);
        return view('landing_pages.kostan.index', compact('kostan'));
    }
    public function kota($kota){
        // $kota = "Kab";
        $kab = Kabupaten::where('title','like','%'.$kota.'%')->first();
        $alamat = AlamatKost::where('kabupaten_id', $kab->code)->first();
        if ($alamat == null) {
            $kostan = TypeKamar::where('kostan_id', 0)->paginate(6);
        }else{
            $kostan = TypeKamar::where('kostan_id',$alamat->kostan_id)->paginate(6);
        }
        return view('landing_pages.kostan.index', compact('kostan'));
        // $kab = Kabupaten::where('title','like','%'.$kota.'%')->get();
        // foreach ($kab as $value) {
        //     # code...
        //     $alamat = AlamatKost::where('kabupaten_id', $value->code)->first();
        //     if ($alamat != null) {
        //         $data = TypeKamar::where('kostan_id',$alamat->kostan_id)->paginate(6);
        //         $kostan[] = $data;
        //     }
        // }
        // dd($kostan);
    }
    public function list_kota(){
        $provinsi = Provinsi::get();
        return view('landing_pages.kostan.filter_kota',compact('provinsi'));
    }
    public function search(request $request){
        return redirect('kostan/search/'.$request->search);
    }
    public function searching($search){
        $kostan =
        TypeKamar::join('kostan', 'kostan_id', '=', 'kostan.id')
        ->where('kostan.nama','like','%'. $search.'%')
        ->orWhere('type_kamar.nama', 'like', '%' . $search . '%')
        ->select('type_kamar.*')
        ->paginate(6);
        return view('landing_pages.kostan.index', compact('kostan'));
    }
}
