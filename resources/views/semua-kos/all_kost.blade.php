<br/>
<nav class="navbar ">
	<div class="container">
	  <a class="navbar-brand">Terdapat <b>{{count($data)}}</b> Kos di Area ini</a>
	  {{-- filter start --}} <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-list-ul" aria-hidden="true"></i>&nbsp;&nbsp;Filter</button>
	  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title btn-sj" id="exampleModalLabel"><b>Filter</b></h5>
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			  <form>
				<div class="mb-3">
				  <label for="recipient-name" class="col-form-label"><b>Urutkan Berdasarkan:</b></label>
				  <select class="form-select" aria-label="Default select example">
					<option value="1">Terbaru</option>
					<option value="2">Termurah</option>
					<option value="3">Termahal</option>
				  </select>
				   {{--
				  <div class="mb-3">
					 --}} <label for="message-text" class="col-form-label"><b>Harga:</b></label>
					<div class="row">
					  <div class="col">
						<div class="input-group flex-nowrap">
						  <span class="input-group-text" id="addon-wrapping">Rp.</span>
						  <input type="text" class="form-control" placeholder="Termurah" aria-label="Username" aria-describedby="addon-wrapping"></div>
					  </div>
					  <div class="col">
						<div class="input-group flex-nowrap">
						  <span class="input-group-text" id="addon-wrapping">Rp.</span>
						  <input type="text" class="form-control" placeholder="Termahal" aria-label="Username" aria-describedby="addon-wrapping"></div>
					  </div>
					</div>
				  </div>
				  <button type="button" class="btn btn-outline-success btn-sm">Rp.400.000-1,2jt</button>
				  <button type="button" class="btn btn-outline-success btn-sm">Rp.600.000- 2,5jt</button>
				  <button type="button" class="btn btn-outline-success btn-sm">Rp.800.000- 3,5jt</button>
				  <div class="mb-3">
					<label for="message-text" class="col-form-label"><b>Jenis Kos:</b></label><br/>
					<button type="button" class="btn btn-outline-success btn-sm " style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:32%; color=black "><i class="bi bi-gender-male"></i>Putra </button>
					<button type="button" class="btn btn-outline-success btn-sm" style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:32%"><i class="bi bi-gender-female"></i>Putri </button>
					<button type="button" class="btn btn-outline-success btn-sm" style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:32%"><i class="bi bi-geo-fill"></i>Campur </button> {{--
					<div class="mb-3">
					   --}} <label for="message-text" class="col-form-label"><b>Fasilitas Kamar:</b></label><br/>
					  <button type="button" class="btn btn-outline-success btn-sm " style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:49%;"><i class="bi bi-fan"></i>&nbsp;Kipas Angin </button>
					  <button type="button" class="btn btn-outline-success btn-sm" style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:49%;"><i class="bi bi-basket"></i>&nbsp;Kamar Mandi Dalam </button><br/>
					  <button type="button" class="btn btn-outline-success btn-sm" style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:49%;"><i class="bi bi-wifi"></i>&nbsp;Internet/Wifi </button>
					  <button type="button" class="btn btn-outline-success btn-sm" style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:49%;"><i class="bi bi-box2-fill"></i>&nbsp;Kasur </button><br/>
					  <button type="button" class="btn btn-outline-success btn-sm" style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:49%;"><i class="bi bi-easel2-fill"></i>&nbsp;Meja Belajar </button>
					  <button type="button" class="btn btn-outline-success btn-sm" style="--bs-btn-padding-y: .30rem; --bs-btn-padding-x: .80rem; --bs-btn-font-size: .75rem; width:49%;"><i class="bi bi-terminal-split"></i>&nbsp;Lemari </button>
					</div>
				  </div>
				  <div class="container d-grid gap-2">
					<button class="btn btn-primary" type="button"><i class="bi bi-search"></i>&nbsp;&nbsp;Cari<br/></button>
				  </div>
				  <br/>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</nav>
<div class="container">
	<div class="row mb-4 ">
		@forelse ($data as $item)
			<div class="col-md-4 my-5">
			<div class="card mx-auto" style="width: 80%;">
				<a href="{{url('kostan/'.$item['slug'])}}" class="stretched-link">
					<!-- GAMBAR KOS -->
				<img src="{{url($item['foto_kost'][0]['path'])}}" class="card-img-top" height="200px">
				</a>
				<div class="card-body">
				<h3 class="card-title mt-n6 harga">{{$item['harga_dari']}}
				</h3>
				<!-- NAMA ALAMAT -->
				<h4 class="card-text mt-4">{{$item['nama']}}</h4>
				<h5>{{$item['kabupaten']}}</h5>
				<small>{{$item['alamat']}}</small>
				</div>

				<!-- DETAIL KOS -->
				<div class="container">
					<div class="row mb-3 px-3 ">
					<div class="col text-start my-auto">
						<img src="{{url('images/icons/bi_people-fill.png')}}" height="25px">
						<h5>Kost {{$item['gender']}}</h5>
					</div>
					<div class="col text-end my-auto">
						<img src="{{url('images/icons/Group 7.png')}}" height="30px">
						<h5>Kost</h5>
					</div>
					</div>

				</div>
			</div>
			</div>
		@empty
			<h3>Kost Tidak Ada</h3>
		@endforelse
	</div>
</div>
<br/>