    <!-- REKOMEN -->
    <div class="container isi mt-4">
        <h1 class="my-5">Kost Rekomendasi</h1>

        <div class="row mb-4 ">
          @forelse ($rekomendasi as $item)
            <div class="col-md-4 my-5">
              <div class="card mx-auto" style="width: 80%;">
                <a href="#" class="stretched-link">
                    <!-- GAMBAR KOS -->
                  <img src="{{url($item['foto'])}}" class="card-img-top" height="200px">
                </a>
                <div class="card-body">
                  <h3 class="card-title mt-n6 harga">{{$item['harga']}}
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
              <h3>Kost Rekomendasi Belum Ada</h3>
          @endforelse

        </div>

        <div class="row" style="margin-bottom: 100px;">
          <div class="col"></div>
          <div class="col-md-6">
            <a href="">
              <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="button">Lihat area lainnya!</button>
              </div>
            </a>
          </div>
          <div class="col"></div>
        </div>
    </div>