@extends('login.index')
@section('isi')

<div class="row login-field">
  <div class="col mt-auto">
    <img src="{{url('images/graphics/daftar_p.png/')}}" width="90%" alt="">
  </div>
  <div class="col px-auto my-auto">
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
    <form method="POST" action="{{ url('daftar-pencari/register') }}">
        @csrf
        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="Password">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Tanggal Lahir</label>
          <input type="date" name="tgl_lahir" class="form-control" id="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="noHp" class="form-label">Alamat</label>
            <textarea name="alamat" id="" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor Handphone</label>
            <input type="text" name="no_hp" class="form-control" id="noHp">
        </div>

        <div class="d-grid gap-2 col-12 mx-auto">
            <button type="submit" class="btn btn-success">Daftar</button >
        </div>
    </form>
    <small class="d-block text-center mt-3">Sudah memiliki akun? <a href="{{url('/masuk-pemilik')}}">login</a></small>

    <button type="button" class="btn btn-danger mt-5">
      <a href="{{url('/')}}" class="text-white " style="text-decoration: none">kembali</a>
    </button>
  </div>
</div>

@endsection
