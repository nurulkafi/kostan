@extends('admin.layouts.master')
@section('type_kamar','active')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Tipe Kamar</h1>
  </div>
   <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Table Tipe Kamar</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <a href="{{ url('admin/type_kamar/create') }}" class="btn btn-primary mr-2">Tambah Data</a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive p-sm-1">
                      <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tipe Kamar</th>
                                <th>Ukuran Kamar</th>
                                <th>Harga</th>
                                <th>Jumlah Kamar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->ukuran_kamar }}</td>
                                <td>{{ number_format($item->harga, 0, '', '.'), }}</td>
                                <td>{{ $item->jumlah_kamar }}</td>
                                <td>
                                    <form method="POST" action="{{ url('admin/type_kamar/'.$item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('admin/type_kamar/'.$item->id.'/edit') }}" class="btn btn-sm btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-icon btn-sm icon-left btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</section>
@include('admin.layouts.sweatalert')
<script>
    $(document).ready(function(){
    $('#myTable').DataTable();
    });
</script>
<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
            title: 'Apakah Anda Yakin Akan Menghapus Data?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                form.submit();
            }
        })
      });

</script>
@endsection
