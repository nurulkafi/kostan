@extends('admin.layouts.master')
@section('kostan','active')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Kostan</h1>
  </div>
   <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Table Kostan</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                            @if (Auth::user()->hasRole('admin|staff'))
                            {{-- <a href="{{ url('admin/kostan/create') }}" class="btn btn-primary mr-2"><i class="bi bi-plus"></i>Tambah Data</a> --}}
                            @else
                            <a href="{{ url('pemilik_kost/kostan/create') }}" class="btn btn-primary mr-2"><i class="bi bi-plus"></i>Tambah Data</a>
                            @endif
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body">
                      <div class="float-right">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            @if (Auth::user()->hasRole('admin|staff'))
                            <a href="{{ url('admin/kostan/cetak/pdf') }}" class="btn btn-danger icon-left text-white"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
                            <a href="{{ url('admin/kostan/cetak/excel') }}" class="btn btn-success icon-left text-white"><i class="bi bi-file-earmark-pdf"></i> EXCEL</a>
                            @else
                            <a href="{{ url('pemilik_kost/kostan/cetak/pdf') }}" class="btn btn-danger icon-left text-white"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
                            <a href="{{ url('pemilik_kost/kostan/cetak/excel') }}" class="btn btn-success icon-left text-white"><i class="bi bi-file-earmark-pdf"></i> EXCEL</a>
                            @endif
                          </div>
                      </div>
                    <div class="table-responsive p-sm-1">
                      <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kostan</th>
                                <th>Gender</th>
                                <th>Alamat</th>
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
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->alamat->alamat_lengkap }}</td>
                                <td>
                                        @if (Auth::user()->hasRole('admin|staff'))
                                        <form method="POST" action="{{ url('admin/kostan/'.$item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon btn-sm icon-left btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i>Delete</button>
                                        </form>
                                        @else
                                        <form method="POST" action="{{ url('pemilik_kost/kostan/'.$item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('pemilik_kost/kostan/'.$item->id) }}" class="btn btn-sm btn-icon icon-left btn-info"><i class="bi bi-eye"></i> Detail</a>
                                        <a href="{{ url('pemilik_kost/kostan/'.$item->id.'/edit') }}" class="btn btn-sm btn-icon icon-left btn-primary"><i class="bi bi-pen"></i> Edit</a>
                                        <button type="submit" class="btn btn-icon btn-sm icon-left btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i>Delete</button>
                                        </form>
                                        @endif

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
