<div class="container">
    <div class="row">
    <div class="col-sm-7">
    <label for="message-text" class="col-form-label"><b>Tipe Kamar</b></label><br/>
    <div class="card mb-3" style="max-width: 638px; height:350px; ">
        <div class="row g-0">
          <div class="col-md-7">
            <img src="{{asset('images/kos/2.png')}}" class="img-fluid rounded-start" style="height:300px;" alt="...">
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <h4 class="card-title">Tipe A</h4>
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#peraturan"
              style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .95rem;width:65%; height:10%;"><i class="bi bi-exclamation-triangle-fill"></i> Peraturan Kost</button>
              <p class="card-text"> &nbsp;<i class="bi bi-aspect-ratio-fill"></i> Ukuran : 4 x 4m</p>
              <p class="card-text"> &nbsp;<i class="bi bi-door-open-fill"></i> 10 Kamar</p>
              <p class="card-text"> &nbsp;<i class="bi bi-tags-fill"></i>  Rp. 500.000 / Bulan</p><BR/>
              <h5 class="card-title">Fasilitas Kamar</h5>
              <div class="row">
                <div class="col">
                  <i class="bi bi-box2-fill"></i>Kasur 
                </div>
                <div class="col">
                  <i class="bi bi-router-fill"></i> Wifi
                </div>
                <div class="col">
                  <i class="bi bi-calendar3-week-fill"></i> Kipas
                </div>
               
               
              </div><br/>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button"><img src="{{url('icon/5.png')}}" class="img-fluid rounded-start" style="height:30px;" alt="...">Pilih Kamar</button>
            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
          Kamar Pilihanmu  
        <h2>Booking Kamar</h2>
        </a>
        </div>
        {{-- Pembayaran --}}
        @include ('layouts.pembayaran')
        {{-- End Pembayaran --}}
                <div class="container">
                <div class="row">
                  <div class="col-sm-7">
                  <label for="message-text" class="col-form-label"></label><br/>
                  <div class="card mb-3" style="max-width: 638px; height:350px; ">
                      <div class="row g-0">
                        <div class="col-md-7">
                          <img src="{{url('images/kos2.jpg')}}" class="img-fluid rounded-start" style="height:300px;" alt="...">
                        </div>
                        <div class="col-md-5">
                          <div class="card-body">
                            <h4 class="card-title">Tipe B</h4>
                            <button type="button" class="btn btn-outline-primary"  data-bs-toggle="modal" data-bs-target="#peraturan"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .95rem;width:65%; height:10%;"><i class="bi bi-exclamation-triangle-fill"></i> Peraturan Kost</button>
                            <p class="card-text"> &nbsp;<i class="bi bi-aspect-ratio-fill"></i> Ukuran : 4 x 4m</p>
                            <p class="card-text"> &nbsp;<i class="bi bi-door-open-fill"></i> 10 Kamar</p>
                            <p class="card-text"> &nbsp;<i class="bi bi-tags-fill"></i>  Rp. 500.000 / Bulan</p><BR/>
                            <h5 class="card-title">Fasilitas Kamar</h5>
                            <div class="row">
                              <div class="col">
                                <i class="bi bi-box2-fill"></i>Kasur 
                              </div>
                              <div class="col">
                                <i class="bi bi-router-fill"></i> wifi
                              </div>
                              <div class="col">
                                <i class="bi bi-calendar3-week-fill"></i>lemari
                              </div>
                            </div>
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
                  <br/>
                  
                  <div class="container">
                  <div class="row">
                    <div class="col-sm-7">
                    <label for="message-text" class="col-form-label"></label><br/>
                    <div class="card mb-3" style="max-width: 638px; height:350px; ">
                        <div class="row g-0">
                          <div class="col-md-7">
                            <img src="{{url('images/kos2.jpg')}}" class="img-fluid rounded-start" style="height:300px;" alt="...">
                          </div>
                          <div class="col-md-5">
                            <div class="card-body">
                              <h4 class="card-title">Tipe C</h4>
                              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#peraturan"
                              style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .95rem;width:65%; height:10%;"><i class="bi bi-exclamation-triangle-fill"></i> Peraturan Kost</button>
                              <p class="card-text"> &nbsp;<i class="bi bi-aspect-ratio-fill"></i> Ukuran : 4 x 4m</p>
                              <p class="card-text"> &nbsp;<i class="bi bi-door-open-fill"></i> 10 Kamar</p>
                              <p class="card-text"> &nbsp;<i class="bi bi-tags-fill"></i>  Rp. 500.000 / Bulan</p><BR/>
                              <h5 class="card-title">Fasilitas Kamar</h5>
                              <div class="row">
                                <div class="col">
                                  <i class="bi bi-box2-fill"></i>Kasur 
                                </div>
                                <div class="col">
                                  <i class="bi bi-router-fill"></i> wifi
                                </div>
                                <div class="col">
                                  <i class="bi bi-calendar3-week-fill"></i>lemari
                                </div>
                              </div>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-outline-primary me-md-2" type="button">Pilih Kamar</button>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <br/>
              </div>
              <div class="modal fade" id="peraturan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Peraturan Kosan.id&nbsp;&nbsp;&nbsp;&nbsp;</h4></center>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="card-text"> &nbsp;<i class="bi bi-house-heart-fill"></i> Tipe ini bisa diisi maks. 2 orang/ kamar</p>
                        <p class="card-text"> &nbsp;<i class="bi bi-gender-male"></i> Kosan ini khusus Putra</p>
                        <p class="card-text"> &nbsp;<i class="bi bi-exclamation-octagon-fill"></i> Tidak untuk pasutri</p>
                        <p class="card-text"> &nbsp;<i class="bi bi-file-break-fill"></i> Tidak boleh pulang lewat dari jam 10 malam </p>
                    
                      
                    </div>
                    
                  </div>
                </div>
              </div>
              </div>
    