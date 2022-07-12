    <!-- SEARCH BAR -->
    <div class="container">
        <div class="card card-body shadow-blur mt-n5">
            <div class="container">
                <form action="{{url('/search')}}" method="get">
                    <div class="row text-center my-auto">
                        <div class="col my-auto">
                            <img src="{{url('images/icons/mdi_google-maps.png')}}" height="50px">
                        </div>
                        <div class="col-md-9 my-auto">
                            <div class="input-group my-auto ">
                                <input type="text" name="keyword" class="form-control" placeholder="Ketik Lokasi atau Nama Kos">
                            </div>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button type="submit" class="btn btn-success btn-lg my-auto">Cari</button>
                        </div>
                    </div>
                </form>
        
            </div>
        </div>
    </div>