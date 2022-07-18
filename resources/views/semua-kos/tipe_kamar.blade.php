<div class="container">
	<div class="row">
		<div class="col-sm-7">
			<label for="message-text" class="col-form-label"><b>Tipe Kamar</b></label><br/>
		</div>
		{{-- Pembayaran --}} 
    
    @include ('semua-kos.pembayaran') 
    
    @php
        $i = 1;
    @endphp

    @foreach ($data['type_kamar'] as $item)
        
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<label for="message-text" class="col-form-label"></label><br/>
					<div class="card mb-3" style="max-width: 638px; height:350px; ">
						<div class="row g-0">
							<div class="col-md-7">
								<img src="{{asset($data['foto_kost'][$i++]['path'])}}" class="img-fluid rounded-start" style="height:300px;" alt="...">
							</div>
							<div class="col-md-5">
								<div class="card-body">
									<h4 class="card-title">{{$item['nama']}}</h4>
									<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#peraturan-{{$item['id']}}" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .95rem;width:65%; height:10%;"><i class="bi bi-exclamation-triangle-fill"></i> Peraturan Kost</button>
									<p class="card-text">
										&nbsp;<i class="bi bi-aspect-ratio-fill"></i> Ukuran : {{$item['ukuran_kamar']}}
									</p>
									<p class="card-text">
										&nbsp;<i class="bi bi-door-open-fill"></i> {{$item['jumlah_kamar']}} Kamar
									</p>
									<p class="card-text">
										&nbsp;<i class="bi bi-tags-fill"></i> Rp. {{number_format($item['harga'],0,',','.')}} / Bulan
									</p>
									<br/>
									<h5 class="card-title">Fasilitas Kamar</h5>
									<div class="row">
									@foreach ($item['fasilitas'] as $fasilitas)
									<div class="col">
										<i class="bi bi-box2-fill"></i>{{$fasilitas['nama']}}
									</div>
									@endforeach
									</div>
									<div class="d-grid gap-2 d-md-flex justify-content-md-end">
										<button class="btn btn-outline-primary me-md-2" type="button">Pilih Kamar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br/>

		<div class="modal fade" id="peraturan-{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel">Peraturan Kosan.id&nbsp;&nbsp;&nbsp;&nbsp;</h4>
						</center>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p class="card-text">
							{!! $item['peraturan'] !!}
						</p>
					</div>
				</div>
			</div>
		</div>
    @endforeach

	</div>