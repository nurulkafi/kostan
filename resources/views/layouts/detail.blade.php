@extends('layouts.index')

@section('content')


<!-- NAVBAR -->
<nav class="navbar ">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{url('images/logo.png')}}" alt="" width="150" height="70" class="d-inline-block align-text-top">
      
    </a> 
 <nav class="navbar navbar-expand-lg ">
      <span class="navbar-text">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#daftar">Daftar</a>
               <!-- Modal -->
               <div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <button type="button" class="btn-close ms-4 mt-4" data-bs-dismiss="modal" aria-label="Close"></button>
                      <h5 class="modal-title text-center">Mau daftar sebagai apa?</h5>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col text-center">
                            <h3>Pemilik Kos</h3>
                            <a href="#">
                              <img src="{{url('images/pemilik.png')}}">
                            </a>
                          </div>
                          <div class="col text-center">
                            <h3>Pencari Kos</h3>
                            <a href="#">
                              <img src="{{url('images/cari.png')}}">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
          
          <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#masuk">Masuk</a>
                  <!-- Modal -->
                  <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <button type="button" class="btn-close ms-4 mt-4" data-bs-dismiss="modal" aria-label="Close"></button>
                          <h5 class="modal-title text-center">Mau Masuk sebagai apa?</h5>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col text-center">
                                <h3>Pemilik Kos</h3>
                                <a href="#">
                                  <img src="{{url('images/pemilik.png')}}">
                                </a>
                              </div>
                              <div class="col text-center">
                                <h3>Pencari Kos</h3>
                                <a href="#">
                                  <img src="{{url('images/cari.png')}}">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </li> 
              </span>
          </div>
          </nav>
      </div>
      <!-- END NAVBAR -->
      
    {{-- corousel --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{url('images/1.png')}}" class="d-block w-100" height="500" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('images/6.png')}}" class="d-block w-100"  height="500" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('images/5.png')}}" class="d-block w-100"   height="500" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div><br/>
        {{-- End corousel --}}

      {{-- modal nama kos --}}
      <div class="container">
      <div class="row">
        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title-m">Kost Buk Melati</h5>
              <p class="card-text">Jl.Pahlawan, Kota Jakarta</p>
              <a href="#" class="btn btn-primary"> <img src="{{url('icon/2.png')}}" class="img-fluid rounded-start" style="height:30px;" alt="...">Kost Putra</a><br/><br/>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-p me-md-2" type="button">Kosong</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-5">
            <button type="button" class="btn btn-p"
                style="--bs-btn-padding-y: .60rem; --bs-btn-padding-x: .60rem; --bs-btn-font-size: 120%; width:100%; height:35%;">
                 Harga Mulai <br/> <b>Rp. 500.000 / Bulan </b>
            </button>
        </div>
      </div>
    </div><br/>

     {{-- FASILITAS KOS --}}
    <div class="container">
        <div class="row">
        <div class="col-sm-7">
        <div class="card">
     <div class="mb-3">
      &nbsp;&nbsp;<label for="message-text" class="col-form-label"><b> Fasilitas Kos </b></label><br/>
        &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-primary btn-sm "
        style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-fan"></i>&nbsp;Kipas Angin
        </button>
        <button type="button" class="btn btn-outline-primary btn-sm"
        style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%;  height:60%;"><i class="bi bi-basket"></i>&nbsp;Kamar Mandi Dalam
        </button><br/>
        &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-primary btn-sm"
        style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-wifi"></i>&nbsp;Internet/Wifi
        </button>
        <button type="button" class="btn btn-outline-primary btn-sm"
        style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-box2-fill"></i>&nbsp;Kasur 
        </button><br/>
        &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-primary btn-sm"
        style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-easel2-fill"></i>&nbsp;Meja Belajar
        </button>
        <button type="button" class="btn btn-outline-primary btn-sm"
        style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%;  height:60%;"><i class="bi bi-terminal-split"></i>&nbsp;Lemari
        </button><br/><br/>
        <center><a href="{{url('/bukti-pembayaran')}}" type="button" class="btn btn-primary">Lihat Lainnya</a></center>
      </div>
      </div>
    </div>
</div>
</div><br/>

{{-- TYPE KAMAR --}}
@include ('layouts.tipe_kamar')
@endsection