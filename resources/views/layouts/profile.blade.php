@extends('layouts.index')
@section('content')
<div class="i">
    <nav class="navbar">
        <div class="container" >
            <a class="navbar-brand -info" href="{{ url('detail') }}" >
                <img src="{{url('images/logo.png')}}" alt="" width="150" height="70" class="d-inline-block align-text-top" align="right">
            </a> 
        </div>
    </nav>

    <div style="margin-top: -70px">
    <center><div class="head">
    <center><h5 class="card-header">Informasi Profile</h5></center>
    </div>
    <center><div class="card -f">
                <div class="modal-body -u">
                    <p>Nama Lengkap : </p>
                    <h6>Ujan Maman  </h6>
                    <p>No Handphone : </p>
                    <h6>081256789434  </h6>
                    <p>Alamat Email: </p>
                    <h6>Ujan@gmail.com  </h6>
                </div>
            </div>
        </div>
    </div>

@endsection