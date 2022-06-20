<?php

namespace App\Http\Controllers;

use App\Models\DetailFasilitas;
use App\Models\Kostan;
use App\Models\TypeKamar;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class TypeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = TypeKamar::latest()->get();
        return view('admin.type_kamar.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kostan = Kostan::get();
        $fasilitas = Fasilitas::get();
        return view('admin.type_kamar.create',compact('kostan','fasilitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $kostan_id = $request->kostan_id;
        $nama_kamar = $request->nama;
        $peraturan = $request->peraturan;
        $ukuran = $request->ukuran[0]."x".$request->ukuran[1];
        $harga = $request->harga;
        $harga = preg_replace('/[^0-9]/', '', $harga);
        $jumlah_kamar = $request->jumlah_kamar;

        $tipe_kamar = TypeKamar::create([
            'kostan_id' => $kostan_id,
            'nama' => $nama_kamar,
            'ukuran_kamar' => $ukuran,
            'peraturan' => $peraturan,
            'harga' => $harga,
            'jumlah_kamar' => $jumlah_kamar
        ]);
        if ($tipe_kamar) {
            for ($i=0; $i < count($request->fasilitas_id) ; $i++) {
                DetailFasilitas::create([
                    'type_kamar_id' => $tipe_kamar->id,
                    'fasilitas_id' => $request->fasilitas_id[$i]
                ]);
            }
        }
        return redirect('admin/type_kamar')->with('message', 'Data Add Successfully');
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
        $kostan = Kostan::get();
        $fasilitas = Fasilitas::get();
        $data = TypeKamar::findOrFail($id);
        return view('admin.type_kamar.edit', compact('kostan', 'fasilitas','data'));
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

        $tipe_kamar = TypeKamar::findOrFail($id);
        $kostan_id = $request->kostan_id;
        $nama_kamar = $request->nama;
        $peraturan = $request->peraturan;
        $ukuran = $request->ukuran[0] . "x" . $request->ukuran[1];
        $harga = $request->harga;
        $harga = preg_replace('/[^0-9]/', '', $harga);
        $jumlah_kamar = $request->jumlah_kamar;

        $tipe_kamar->update([
            'kostan_id' => $kostan_id,
            'nama' => $nama_kamar,
            'ukuran_kamar' => $ukuran,
            'peraturan' => $peraturan,
            'harga' => $harga,
            'jumlah_kamar' => $jumlah_kamar
        ]);
        if ($tipe_kamar) {
            if ($request->fasilitas_id != null) {
                # code...
                for ($i = 0; $i < count($request->fasilitas_id); $i++) {
                    DetailFasilitas::create([
                        'type_kamar_id' => $tipe_kamar->id,
                        'fasilitas_id' => $request->fasilitas_id[$i]
                    ]);
                }
            }
        }
        return redirect('admin/type_kamar')->with('message', 'Data update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipe_kamar = TypeKamar::findOrFail($id);
        $tipe_kamar->delete();
        return redirect('admin/type_kamar')->with('message', 'Data Delete Successfully');
    }
}
