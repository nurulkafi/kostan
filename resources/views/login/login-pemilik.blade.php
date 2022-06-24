@extends('login.index')
@section('isi')

<div class="row login-field">
  <div class="col mt-auto">
    <img src="{{url('images/graphics/login_p.png/')}}" width="90%" alt="">
  </div>
  <div class="col px-auto my-auto">
    <a href="{{url('/')}}" class="text-muted " style="text-decoration: none">&lt;kembali</a>
    <h3 class="judul text-center">Login Pemilik Kos</h3>
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="d-grid gap-2 col-12 mx-auto">
        <a hreaf="" type="button" class="btn btn-success">Masuk</a>
      </div>
    </form>
    <small class="d-block text-center mt-3">Belum Memililiki Akun? <a href="{{url('/daftar-pemilik')}}">Registrasi Disini</a></small>
  </div>
</div>

@endsection