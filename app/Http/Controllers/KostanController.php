<?php

namespace App\Http\Controllers;

use App\Models\AlamatKost;
use App\Models\FotoKost;
use App\Models\Kabupaten;
use App\Models\Kostan;
use App\Models\PemilikKost;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class KostanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id',$user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $data = Kostan::latest()->get();
        }  else {
            $data = Kostan::where('pemilik_kost_id',$pemilik_kost->id)->get();
        }
        return view('admin.kostan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinsi = Provinsi::get();
        return view('admin.kostan.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id',$user->id)->first();
        $kostan = Kostan::create([
            'nama' => $request->nama,
            'pemilik_kost_id' => $pemilik_kost->id,
            'slug' => Str::slug($request->nama),
            'gender' => $request->gender,
            'deskripsi' => $request->deskripsi
        ]);
        if ($kostan) {
            $alamat = AlamatKost::create([
                'alamat_lengkap' => $request->alamat,
                'kostan_id' => $kostan->id,
                'kabupaten_id' => $request->kabupaten_id
            ]);
            $image = $request->file('image');
            for ($i = 0; $i < count($image); $i++) {
                $nama_photo = rand() . $image[$i]->getClientOriginalName();
                $image[$i]->move('images/kostan', $nama_photo);
                $photo = 'images/kostan/' . $nama_photo;
                $foto_kost = FotoKost::create([
                    'path' => $photo,
                    'kostan_id' => $kostan->id
                ]);
            }
        }
        return redirect('admin/kostan')->with('message', 'Data added Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Kostan::findOrFail($id);
        $provinsi = Provinsi::get();
        $kota = Kabupaten::where('provinsi_id',$data->alamat->kabupaten->provinsi_id)->get();
        return view('admin.kostan.edit',compact('data','provinsi','kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kostan = Kostan::findOrFail($id);
        $kostan = $kostan->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'gender' => $request->gender,
            'deskripsi' => $request->deskripsi
        ]);
        if ($kostan) {
            $alamat = AlamatKost::where('kostan_id',$id)->first();
            $alamat = $alamat->update([
                'alamat_lengkap' => $request->alamat,
                'kabupaten_id' => $request->kabupaten_id
            ]);
        }
        return redirect('admin/kostan')->with('message', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Kostan::findOrFail($id);
        $foto = FotoKost::where('kostan_id',$data->id)->get();
        foreach ($foto as $value) {
            File::delete(public_path($value->path));
        }
        $data->delete();
        return redirect('admin/kostan')->with('message', 'Data delete Successfully');
    }

}
