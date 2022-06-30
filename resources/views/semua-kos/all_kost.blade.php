<br/>
<div class="container">
	<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse ($data as $item)
        
		<div class="col-md-4">
			<div class="card bg-dark text-white">
				<img src="{{url($item['foto_kost'][0]['path'])}}" class="card-img" alt="...">
				</span>
				<div class="card-img-overlay">
					<img src="{{url('img/logo.png')}}" alt="" width="70" height="25" class="d-inline-block align-text-top bg-light">
					<br>
					<br>
					<br>
					<b>
					<h5>{{$item['nama']}}</h5>
					</b>
					<h6>{{$item['alamat']}} ,{{$item['kabupaten']}} 
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            <button type="button" class="btn btn-success" style="--bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Ada Kosong</button></h6>
					  <button type="button" class="btn btn-primary btn-sn" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .58rem; width:24%; height:15%; color:white">Kost {{$item['gender']}} &nbsp;
            <br/>
				</div>
			</div>
		</div>
    @empty
      <h3>Kost TIdak Tersedia</h3>
    @endforelse
	</div>
</div>
<br/>