@extends('layouts.index')
@section('content')

<!-- NAVBAR -->

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
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#daftar">Pemilik Kos</a>
            </li>
                  <div class="dropdown">
                  <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                Name user
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                 <li>
                     <a class="dropdown-item" href="{{url('/profile')}}">
                       <img src="http://mnurulkafi.nurulfikri.com/kostan/public/images/graphics/profile.png" height="20px" /> Profil
                     </a>
                 </li>
                 <li>
                     <a class="dropdown-item" href="#">
                       <img src="http://mnurulkafi.nurulfikri.com/kostan/public/images/graphics/logout.png" height="20px"/> keluar
                     </a>
                 </li>
            </ul>
           </div>
          </li>

                  </li> 
              </span>
          </div>
          </nav>
      </div>
      <!-- END NAVBAR -->


<div class="container">
    <center><div class="card -p">
    <center><h5 class="card-header">Upload Bukti Pembayaran</h5></center>
    <center><div class="modal-body">
        <img src="{{url('images/upload.png')}}" class="img-fluid rounded-start" style="height:180px; width:180px;" alt="...">
        <h6>Format Gambar: JPG, JPEG, PNG. max 10mb</h6>
        
    <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-g " type="button">Pilih Gambar</button>
            <button class="btn btn-h" type="button" data-bs-toggle="modal" data-bs-target="#sukses">UPLOAD</button>
          </div>
      </div></center>
  </div></center>

  <div class="modal fade" id="sukses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <center><div class="modal-body">
          <img src="{{url('images/done.png')}}" class="img-fluid rounded-start" style="height:130px; width:130px;" alt="...">
          <h2>Good Job!</h2>
          <h6>File Upload Sukses</h6>
          
            <a href="{{url('/detail')}}" type="button" class="btn btn-ok" 
            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:32%; height:35%; ">
            OK
            </a>    
        </div></center>
        
      </div>
    </div>
  </div>
</div>
@endsection