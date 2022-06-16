<?php

namespace App\Http\Controllers;

use App\Models\FotoKost;
use Illuminate\Http\Request;
use File;

class FotoKostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $image = $request->file('image');
        $nama_photo = rand() . $image->getClientOriginalName();
        $image->move('images/kostan', $nama_photo);
        $photo = 'images/kostan/' . $nama_photo;
        $foto_kost = FotoKost::create([
            'path' => $photo,
            'kostan_id' => $id
        ]);
        return redirect('admin/kostan/' . $id . '/edit')->with('message', 'Photo Add Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_foto, $id_kostan)
    {
        $foto = FotoKost::findOrFail($id_foto);
        File::delete(public_path($foto->path));
        $foto->delete();
        return redirect('admin/kostan/'.$id_kostan.'/edit')->with('message', 'Photo delete Successfully');
    }
}
