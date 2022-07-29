<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Penyewa;
use App\Models\TypeKamar;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function index(){
        $kostan = TypeKamar::where('jumlah_kamar','>' , 0)->paginate(6);
        return view('landing_pages.home.index',compact('kostan'));
    }
    public function wishlist(request $request,$id){
        $penyewa_id = Penyewa::where('users_id', \Auth::user()->id)->first();
        $saved = Wishlist::create([
            'penyewa_id' => $penyewa_id->id,
            'tipe_kamar_id' => $id
        ]);
        if ($saved) {
            Alert::success('Success', 'Berhasil ditambahkan ke wishlist');
            return redirect('/');
        }
    }
    public function hapus_wishlist($id){
        $wishlist = Wishlist::findOrFail($id)->delete();
        Alert::success('Success', 'Berhasil dihapus dari wishlist');
        return redirect('/');
    }
    public function hapus_wishlist2($id)
    {
        $wishlist = Wishlist::where('tipe_kamar_id',$id)->first()->delete();
        Alert::success('Success', 'Berhasil dihapus dari wishlist');
        return redirect('/kostan');
    }
}
