@extends('login.index')
@section('isi')

<div class="row login-field">
  <div class="col mt-auto">
    <img src="{{url('images/graphics/daftar_cari.png/')}}" width="90%" alt="">
  </div>
  <div class="col px-auto my-auto">
    <a href="{{url('/landing')}}" class="text-muted " style="text-decoration: none">&lt;kembali</a>
    <h3 class="judul text-center">Daftar Pencari Kos</h3>
    <form>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" id="Email" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="noHp" class="form-label">Nomor Handphone</label>
        <input type="number" class="form-control" id="noHp">
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password">
      </div>
      <div class="d-grid gap-2 col-12 mx-auto">
        <a href="" type="button" class="btn btn-success">Daftar</a>
      </div>
    </form>
    <small class="d-block text-center mt-3">Sudah memiliki akun? <a href="{{url('/masuk-pencari')}}">login</a></small>
  </div>
</div>

@endsection
