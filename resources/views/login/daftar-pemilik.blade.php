@extends('login.index')
@section('isi')

<div class="row login-field">
  <div class="col mt-auto">
    <img src="{{url('images/graphics/daftar_pemilik_3.png/')}}" width="90%" alt="">
  </div>
  <div class="col mt-6">
    <button type="button" class="btn btn-danger">
      <a href="{{url('/')}}" class="text-white " style="text-decoration: none"><i class="bi bi-arrow-left"></i> Kembali</a>
    </button>
    <h3 class="judul text-center">Daftar Pemilik Kos</h3>
    @if ($errors->any())
    <div class="alert alert-danger text-white" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ url('daftar-pemilik/register') }}">
        @csrf
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="Email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="Password">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" id="nama" value="{{ old('tgl_lahir') }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="noHp" class="form-label">Jenis Kelamin</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="Laki-Laki">
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="noHp" class="form-label">Alamat</label>
            <textarea name="alamat" id="" class="form-control" rows="3">{{ old('alamat') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor Handphone</label>
            <input type="text" name="no_hp" class="form-control" id="noHp" value="{{ old('no_hp') }}">
        </div>
        <div class="d-grid gap-2 col-12 mx-auto">
            <button type="submit" class="btn btn-success">Daftar</button >
        </div>
    </form>
    <small class="d-block text-center mt-3 mb-6">Sudah memiliki akun? <a href="{{url('/masuk-pencari')}}">login</a></small>

  </div>
</div>

@endsection
