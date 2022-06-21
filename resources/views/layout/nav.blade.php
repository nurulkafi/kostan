    <!-- NAVBAR -->
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <div class="container">
            <div class="row">
              <div class="col">
                <img src="{{url('images/Logo.png')}}" alt="" height="60" class="navbar-brand my-auto">
              </div>
              <div class="col-6">
                </div>
              <div class="col my-auto">
                <ul class="d-flex butnav my-auto ">
                  {{-- <li>
                  <!-- Button trigger modal -->
                      <a data-bs-toggle="modal" data-bs-target="#daftar">
                      Daftar
                      </a>
                              
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
                                        <img src="{{url('images/graphics/pemilik.png')}}">
                                      </a>
                                    </div>
                                    <div class="col text-center">
                                      <h3>Pencari Kos</h3>
                                      <a href="#">
                                        <img src="{{url('images/graphics/cari.png')}}">
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                  </li> --}}
          
                  <li class="ms-auto">
                  <!-- Button trigger modal -->
                    <a data-bs-toggle="modal" data-bs-target="#masuk">
                      Masuk
                    </a>
                              
                    <!-- Modal -->
                      <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <button type="button" class="btn-close ms-4 mt-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5 class="modal-title text-center">Mau masuk sebagai apa?</h5>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col text-center">
                                  <h3>Pemilik Kos</h3>
                                  <a href="{{url('/masuk-pemilik')}}">
                                    <img src="{{url('images/graphics/pemilik.png')}}">
                                  </a>
                                </div>
                                <div class="col text-center">
                                  <h3>Pencari Kos</h3>
                                  <a href="{{url('/masuk-pencari')}}">
                                    <img src="{{url('images/graphics/cari.png')}}">
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>