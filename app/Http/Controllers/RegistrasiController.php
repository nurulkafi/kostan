<?php

namespace App\Http\Controllers;

use App\Models\PemilikKost;
use App\Models\Penyewa;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar_pemilik_view()
    {
        //
        return view('login.daftar-pemilik');
    }
    public function daftar_pemilik_post(Request $request){
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_hp' => ['required', 'numeric'],
                'nama' => ['required'],
                'tgl_lahir' => ['date', 'required'],
                'alamat' => ['required'],
                'jk' => ['required']
            ],
            [
                'email.required' => 'Email wajib diisi!',
                'email.unique' => 'Email sudah digunakan!',
                'no_hp.required' => 'No Hp wajib diisi!',
                'no_hp.numeric' => 'Masukan Nomor Hp Yang Benar!',
                'tgl_lahir.required' => 'Tanggal Lahir wajib diisi!',
                'alamat.required' => 'Alamat wajib diisi!',
                'nama.required' => 'Nama wajib diisi!',
                'jk.required' => 'Jenis kelamin wajib diisi!',
            ]

        );

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        if($user){
            PemilikKost::create([
                'nama' =>  $request->nama,
                'users_id' =>  $user->id,
                'tgl_lahir' =>  $request->tgl_lahir,
                'alamat' =>  $request->alamat,
                'no_hp' =>  $request->no_hp,
                'jenis_kelamin' => $request->jk
            ]);
            $user->assignRole(3); //pemilik-kost
            Alert::success('Registrasi', 'Registrasi Success');
            return redirect('masuk-pemilik');
        }
    }
    public function daftar_penyewa_view()
    {
        //
        return view('login.daftar-pencari');
    }
    public function daftar_penyewa_post(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_hp' => ['required', 'numeric'],
                'nama' => ['required'],
                'tgl_lahir' => ['date', 'required'],
                'alamat' => ['required'],
                'jk' => ['required']
            ],
            [
                'email.required' => 'Email wajib diisi!',
                'email.unique' => 'Email sudah digunakan!',
                'no_hp.required' => 'No Hp wajib diisi!',
                'no_hp.numeric' => 'Masukan Nomor Hp Yang Benar!',
                'tgl_lahir.required' => 'Tanggal Lahir wajib diisi!',
                'alamat.required' => 'Alamat wajib diisi!',
                'nama.required' => 'Nama wajib diisi!',
                'jk.required' => 'Jenis kelamin wajib diisi!',
            ]

        );
        $image = $request->file('image');
        $nama_photo = rand() . $image->getClientOriginalName();
        $image->move('images/foto/penyewa/', $nama_photo);
        $photo = 'images/foto/penyewa/' . $nama_photo;
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);
        if ($user) {
            Penyewa::create([
                'nama' =>  $request->nama,
                'users_id' =>  $user->id,
                'tgl_lahir' =>  $request->tgl_lahir,
                'alamat' =>  $request->alamat,
                'no_hp' =>  $request->no_hp,
                'jenis_kelamin' => $request->jk,
                'foto' => $photo
            ]);
            $user->assignRole(4); //penyewa-kost
            Alert::success('Registrasi', 'Registrasi Success');
            return redirect('masuk-pencari');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
