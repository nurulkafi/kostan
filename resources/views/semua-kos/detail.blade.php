@extends('semua-kos.detail_index')

@section('title', $data['nama'])

@section('content') 
		{{-- corousel --}}
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
                @foreach ($data['foto_kost'] as $item)
				<div class="carousel-item active">
                    <img src="{{asset($item['path'])}}" class="d-block w-100" height="500" alt="...">
				</div>
                @endforeach
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</button>
		</div>
		<br/>
		{{-- End corousel --}} 
        
        {{-- modal nama kos --}}
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title-m">{{$data['nama']}}</h5>
							<p class="card-text">{{$data['alamat']}}, {{$data['kabupaten']}}</p>
							<a href="#" class="btn btn-primary"><img src="{{asset('icon/2.png')}}" class="img-fluid rounded-start" style="height:30px;" alt="...">Kost {{$data['gender']}}</a><br/><br/>
							<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								<button class="btn btn-p me-md-2" type="button">Kosong</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<button type="button" class="btn btn-p" style="--bs-btn-padding-y: .60rem; --bs-btn-padding-x: .60rem; --bs-btn-font-size: 120%; width:100%; height:35%;">
					Harga Mulai <br/><b>{{$data['harga_dari']}} / Bulan </b>
					</button>
                    
					{{-- @auth
						<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
						Kamar Pilihanmu
						<h2>Booking Kamar</h2>
						</a>
					@endauth --}}
                </div>
			</div>
		</div>
		<br/>
		{{-- FASILITAS KOS --}}
		{{-- <div class="container">
			<div class="row">
				<div class="col-sm-7">
					<div class="card">
						<div class="mb-3">
							&nbsp;&nbsp;<label for="message-text" class="col-form-label"><b> Fasilitas Kos </b></label><br/>
							
							<button type="button" class="btn btn-outline-primary btn-sm" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-basket"></i>&nbsp;Kamar Mandi Dalam </button><br/>
							&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-outline-primary btn-sm" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-wifi"></i>&nbsp;Internet/Wifi </button>
							<button type="button" class="btn btn-outline-primary btn-sm" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-box2-fill"></i>&nbsp;Kasur </button><br/>
							&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-primary btn-sm" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-easel2-fill"></i>&nbsp;Meja Belajar </button>
							<button type="button" class="btn btn-outline-primary btn-sm" style="--bs-btn-padding-y: .40rem; --bs-btn-padding-x: .40rem; --bs-btn-font-size: .90rem; width:48%; height:60%;"><i class="bi bi-terminal-split"></i>&nbsp;Lemari </button><br/><br/>
							<center><a href="{{url('/bukti-pembayaran')}}" type="button" class="btn btn-primary">Lihat Lainnya</a></center>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<br/>
{{-- TYPE KAMAR --}}
@include ('semua-kos.tipe_kamar')
@endsection