
<div class="col-sm-5"><br/>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Pilih Metode Pembayaran </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <center><img src="{{url('images/BRI.jpeg')}}" class="ages-fluid rounded-start" style=" height:130px; width:130px" alt="..."></center>
                        </div>  
                      </div>
                     <center> <h6 class="card-title">BRI Virtual Account</h6>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                      style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:45%; height:11.5%;"> PILIH </button></center>
                    </div>    
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <center><img src="{{url('images/gopay.png')}}" class="img-fluid rounded-start" style=" height:130px; width:130px" alt="..."></center>
                       
                          </div>     
                        </div>
                        <center><h6 class="card-title">GOPAY</h6>
                        <!-- Button trigger modal -->
                        
                        <button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#staticback" 
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:45%; height:11.5%;"> PILIH</button></center>
                      </div>
                      <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <center><img src="{{url('images/mandi.jpg')}}" class="img-fluid rounded-start" style="height:130px; width:130px" alt="..."></center>
                           
                              </div>     
                            </div>
                            <center><h6 class="card-title">Mandiri Virtual Account</h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#staticb"
                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:45%; height:11.5%;"> PILIH</button></center>
                    </div>
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <center><img src="{{url('images/bni2.jpg')}}" class="img-fluid rounded-start" style="height:130px; width:130px" alt="..."></center>
                         
                            </div>     
                          </div>
                          <center><h6 class="card-title">BNI Virtual Account</h6>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#staticbk" 
                          style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:45%; height:11.5%;"> PILIH</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
                </div>
                </div>
                <!-- Modal BRI-->
                <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <center><h4 class="modal-title" id="exampleModalLabel">Metode Pembayaran<img src="{{url('images/bri.jpg')}}" class="img-fluid rounded-start" style="height:100px;" alt="..."></h4></center>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <center><div class="modal-body">
                        <h6>Jumlah Tagihan Yang Harus Dibayar</h6>
                        <font color="red"> <h4 >Rp.500.000</h4></font>
                        <h6>No.Rekening</h6>
                        <font color="red"> <h4>1400079999088 </h4></font>
                          <h6>A/n : Kos Bu Melati</h6>
                          <a href="{{url('/bukti-pembayaran')}}"  type="button" class="btn btn-p"
                          style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:64%; height:35%; ">
                          UPLOAD BUKTI PEMBAYARAN
                          </a>
                      </div></center>
                    </div>
                  </div>
                </div>
           
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Pilih Metode Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="{{url('images/bri.jpg')}}" class="img-fluid rounded-start" style="height:150px;" alt="...">BRI Virtual Account
                    <!-- Button trigger modal -->
                    <center><button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#example"
                      style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:55%; height:11.5%;">
                      BOOKING SEKARANG
                    </button></center>
                  </div>
                </div>
              </div>
            </div>
              
          </div>
        </div>
         <!-- End Modal BRI -->
          <!-- Modal Gopay -->
          <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">Metode Pembayaran &nbsp;&nbsp;<img src="{{url('images/gopay.jpg')}}" class="img-fluid rounded-start" style="height:80px;" alt="..."></h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <center><div class="modal-body">
                    <h6>Jumlah Tagihan Yang Harus Dibayar</h6>
                    <font color="red"> <h4 >Rp.500.000</h4></font>
                    <h6>No.Gopay</h6>
                    <font color="red"> <h4>081245678923</h4></font>
                      <h6>A/n : Kos Bu Melati</h6>
                      <a href="{{url('/bukti-pembayaran')}}"  type="button" class="btn btn-p"
                      style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:64%; height:35%; ">
                      UPLOAD BUKTI PEMBAYARAN
                      </a>
                  </div></center>
                </div>
              </div>
            </div>
          </div>
      <!-- Modal -->
      <div class="modal fade" id="staticback" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Pilih Metode Pembayaran</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <center><div class="modal-body">
              <img src="{{url('images/gopay.jpg')}}" class="img-fluid rounded-start" style="height:100px;" alt="..."> 
          
              
              <!-- Button trigger modal -->
              <center><button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#example"
                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:55%; height:11.5%;">
                BOOKING SEKARANG
              </button></center>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
   <!-- End Modal Gopay -->
   <!-- Modal Mandiri-->
   <div class="modal fade" id="examModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <center><h4 class="modal-title" id="exampleModalLabel">Metode Pembayaran<img src="{{url('images/mandi.jpg')}}" class="img-fluid rounded-start" style="height:120px; width:200px;" alt="..."></h4></center>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <center><div class="modal-body">
          <h6>Jumlah Tagihan Yang Harus Dibayar</h6>
          <font color="red"> <h4 >Rp.500.000</h4></font>
          <h6>No.Rekening</h6>
          <font color="red"> <h4>657881245678923</h4></font>
            <h6>A/n : Kos Bu Melati</h6>
            <a href="{{url('/bukti-pembayaran')}}"  type="button" class="btn btn-p"
            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:64%; height:35%; ">
            UPLOAD BUKTI PEMBAYARAN
            </a>
        </div></center>
        
      </div>
    </div>
  </div>
      
      <div class="modal fade" id="staticb" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Pilih Metode Pembayaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <center><div class="modal-body">
          <img src="{{url('images/mandiri.jpg')}}" class="img-fluid rounded-start" style="height:145px;" alt="..."> Mandiri Virtual Account
            
          <br/><!-- Button trigger modal -->
          <button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#examModal" 
          style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:55%; height:11.5%;">
           BOOKING SEKARANG
          </button>
        </div></center>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- End Modal Mandiri -->
  
       <!-- Modal BNI -->
    

   <div class="modal fade" id="exampModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Metode Pembayaran&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{url('images/bni2.jpg')}}" class="img-fluid rounded-start" style="height:100px; width:150px;" alt="..."></h4></center>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <center><div class="modal-body">
          <h6>Jumlah Tagihan Yang Harus Dibayar</h6>
          <font color="red"> <h4 >Rp.500.000</h4></font>
          <h6>No.Rekening</h6>
          <font color="red"> <h4>56789081245678923</h4></font>
            <h6>A/n : Kos Bu Melati</h6>
            <a href="{{url('/bukti-pembayaran')}}"  type="button" class="btn btn-p"
            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:64%; height:35%; ">
            UPLOAD BUKTI PEMBAYARAN
            </a>
        </div></center>
        
      </div>
    </div>
  </div>
      
  <div class="modal fade" id="staticbk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pilih Metode Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <center><div class="modal-body">
        <img src="{{url('images/bni2.jpg')}}" class="img-fluid rounded-start" style="height:145px;" alt="...">  BNI Virtual Account 
        <br/><!-- Button trigger modal -->
        <button type="button" class="btn btn-p" data-bs-toggle="modal" data-bs-target="#exampModal"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem;width:64%; height:35%; ">
        BOOKING SEKARANG
        </button>
        
      </div></center>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- end Modal BNI -->