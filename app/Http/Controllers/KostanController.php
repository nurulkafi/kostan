<?php

namespace App\Http\Controllers;

use App\Exports\KostanExport;
use App\Models\AlamatKost;
use App\Models\FotoKost;
use App\Models\Kabupaten;
use App\Models\Kostan;
use App\Models\PemilikKost;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

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
        $request->validate(
            [
                'nama' => ['required', 'unique:kostan'],
                'gender' => ['required'],
                'deskripsi' => ['required'],
                'kabupaten_id' => ['required'],
            ],
            [
                'nama.required' => 'Nama Kostan Wajib Diisi..',
                'nama.unique' => 'Nama Kostan Sudah Digunakan..',
                'gender.required' => 'Gender Wajib Diisi..',
                'alamat.required' => 'Alamat Wajib Diisi..',
                'kabupaten_id' => 'Kota / Kabupaten Wajib Diisi..',
            ]

        );
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
        if (\Auth::user()->hasRole('admin|staff')) {
            # code...
            return redirect('admin/kostan')->with('message', 'Data added Successfully');
        } else {
            return redirect('pemilik_kost/kostan')->with('message', 'Data added Successfully');
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
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id',$user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $data = Kostan::where('id', $id)->first();
        } else {
            $data = Kostan::where('pemilik_kost_id', $pemilik_kost->id)->where('id',$id)->first();
        }
        return view('admin.kostan.detail', compact('data'));
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
        // $request->validate(
        //     [
        //         'nama' => ['required', 'unique:kostan'],
        //         'gender' => ['required'],
        //         'deskripsi' => ['required'],
        //         'kabupaten_id' => ['required'],
        //     ],
        //     [
        //         'nama.required' => 'Nama Kostan Wajib Diisi..',
        //         'nama.unique' => 'Nama Kostan Sudah Digunakan..',
        //         'gender.required' => 'Gender Wajib Diisi..',
        //         'alamat.required' => 'Alamat Wajib Diisi..',
        //         'kabupaten_id' => 'Kota / Kabupaten Wajib Diisi..',
        //     ]

        // );
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
        if (\Auth::user()->hasRole('admin|staff')) {
            # code...
            return redirect('admin/kostan')->with('message', 'Data Update Successfully');
        } else {
            return redirect('pemilik_kost/kostan')->with('message', 'Data Update Successfully');
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
        //
        $data = Kostan::findOrFail($id);
        $foto = FotoKost::where('kostan_id',$data->id)->get();
        foreach ($foto as $value) {
            File::delete(public_path($value->path));
        }
        $data->delete();
        if (\Auth::user()->hasRole('admin|staff')) {
            # code...
            return redirect('admin/kostan')->with('message', 'Data Delete Successfully');
        } else {
            return redirect('pemilik_kost/kostan')->with('message', 'Data Delete Successfully');
        }
    }
    public function pdf(){
        $user = \Auth::user();
        $pemilik_kost = PemilikKost::where('users_id', $user->id)->first();
        if ($user->hasRole("admin|staff")) {
            $data = Kostan::latest()->get();
        } else {
            $data = Kostan::where('pemilik_kost_id', $pemilik_kost->id)->get();
        }
        $pdf = PDF::loadView('admin.kostan.pdf', ['data' => $data]);
        return $pdf->setPaper('a4', 'landscape')->setWarnings(false)->download('data_kostan_'.date('d-m-Y').'_.pdf');
        // return view('admin.kostan.pdf', compact('data'));
    }
    public function excel()
    {
        return Excel::download(new KostanExport, 'kostan.xlsx');
    }
}
