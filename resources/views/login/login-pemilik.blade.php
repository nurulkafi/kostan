@extends('login.index')
@section('isi')

<div class="row login-field mt-6">
  <div class="col mt-auto">
    <img src="{{url('images/graphics/daftar_pemilik_2.png/')}}" width="95%" alt="">
  </div>
  <div class="col mt-6">
    <button type="button" class="btn btn-danger">
      <a href="{{url('/')}}" class="text-white " style="text-decoration: none"><i class="bi bi-arrow-left"></i> Kembali</a>
    </button>
    <h3 class="judul text-center">Login Pemilik Kos</h3>
    <form method="POST" action="{{ route('login') }}">
    @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      </div>
      <div class="d-grid gap-2 col-12 mx-auto">
        <button type="submit" class="btn btn-success">
            {{ __('Login') }}
        </button>
      </div>
    </form>
    <small class="d-block text-center mt-3">Belum Memililiki Akun? <a href="{{url('/daftar-pemilik')}}">Registrasi Disini</a></small>
  </div>
</div>

@endsection
