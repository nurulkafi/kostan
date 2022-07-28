<?php

namespace App\Http\Controllers;

use App\Exports\TypeKamarExport;
use App\Models\DetailFasilitas;
use App\Models\Kostan;
use App\Models\TypeKamar;
use App\Models\Fasilitas;
use App\Models\PemilikKost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if (!$user->hasRole("admin|staff")) {
            $data = TypeKamar::join('kostan', 'kostan_id', '=', 'kostan.id')->select('type_kamar.*')->where('pemilik_kost_id', $pemilik_kost->id)->get();
        }else{
            $data = TypeKamar::get();
        }
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
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        $kostan = Kostan::where('pemilik_kost_id',$pemilik_kost->id)->get();
        $fasilitas = Fasilitas::where('pemilik_kost_id', $pemilik_kost->id)->get();
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
        $kostan = Kostan::findOrFail($kostan_id);
        $nama_kamar = $request->nama;
        $peraturan = $request->peraturan;
        $ukuran = $request->ukuran[0]."x".$request->ukuran[1];
        $harga = $request->harga;
        $harga = preg_replace('/[^0-9]/', '', $harga);
        $jumlah_kamar = $request->jumlah_kamar;

        $tipe_kamar = TypeKamar::create([
            'kostan_id' => $kostan_id,
            'nama' => $nama_kamar,
            'slug' => Str::slug($kostan->slug."-".$nama_kamar),
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
        if (\Auth::user()->hasRole('admin|staff')) {
            # code...
            return redirect('admin/type_kamar')->with('message', 'Data Add Successfully');
        } else {
            return redirect('pemilik_kost/type_kamar')->with('message', 'Data Add Successfully');
        }

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
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        $kostan = Kostan::where('pemilik_kost_id', $pemilik_kost->id)->get();
        $fasilitas = Fasilitas::where('pemilik_kost_id', $pemilik_kost->id)->get();
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
        if (\Auth::user()->hasRole('admin|staff')) {
            # code...
            return redirect('admin/type_kamar')->with('message', 'Data Update Successfully');
        } else {
            return redirect('pemilik_kost/type_kamar')->with('message', 'Data Update Successfully');
        }
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
        if (\Auth::user()->hasRole('admin|staff')) {
            # code...
            return redirect('admin/type_kamar')->with('message', 'Data Delete Successfully');
        } else {
            return redirect('pemilik_kost/type_kamar')->with('message', 'Data Delete Successfully');
        }
    }
    public function pdf()
    {
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if (!$user->hasRole("admin|staff")) {
            $data = TypeKamar::join('kostan', 'kostan_id', '=', 'kostan.id')->where('pemilik_kost_id', $pemilik_kost->id)->get();
        } else {
            $data = TypeKamar::get();
        }
        $pdf = PDF::loadView('admin.type_kamar.pdf', ['data' => $data]);
        return $pdf->setPaper('a4', 'landscape')->setWarnings(false)->download('type_kamar_' . date('d-m-Y') . '_.pdf');
    }
    public function excel()
    {
        return Excel::download(new TypeKamarExport, 'typekamar.xlsx');
    }
}
