@extends('admin.layouts.master')
@if ($status == "all")
    @section('transaksi','active')
@elseif($status == "menunggu_konfirmasi")
    @section('menunggu_konfirmasi','active')
@elseif($status == "transaksi_dibatalkan")
    @section('dibatalkan','active')
@elseif($status == "transaksi_selesai")
    @section('selesai','active')
@elseif($status == "update_jumlah_kamar")
    @section('update_jumlah_kamar','active')
@else
    @section('pengembalian_dana','active')
@endif
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Transaksi</h1>
  </div>
   <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Table Transaksi</h4>
                  </div>
                  <div class="card-body">
                    <div class="float-right">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            @if (Auth::user()->hasRole('admin|staff'))
                            <a href="{{ url('admin/transaksi/cetak/pdf') }}" class="btn btn-danger icon-left text-white"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
                            @else
                            <a href="{{ url('pemilik_kost/transaksi/cetak/pdf') }}" class="btn btn-danger icon-left text-white"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
                            @endif
                          </div>
                      </div>
                    <div class="table-responsive p-sm-1">
                      <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kostan</th>
                                <th>Penyewa</th>
                                <th>Status</th>
                                <th>Keterangan</th>
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
                                    <td>{{ $item->kostan($item->tipe_kamar_id) }}</td>
                                    <td>{{ $item->penyewa($item->penyewa_id) }}</td>
                                    <td>
                                         @if ($item->status == \App\Models\Transaksi::Menunggu_pembayaran)
                                         <span class="badge badge-primary">{{ $item->status }}</span></td>
                                         @elseif($item->status == \App\Models\Transaksi::Menunggu_verif)
                                         <span class="badge badge-warning">{{ $item->status }}</span></td>
                                         @elseif($item->status == \App\Models\Transaksi::Terkonfirmasi)
                                         <span class="badge badge-success">{{ $item->status }}</span></td>
                                         @elseif($item->status == \App\Models\Transaksi::Menunggu_pemilik)
                                         <span class="badge badge-info">{{ $item->status }}</span></td>
                                         @elseif($item->keterangan != null)
                                          <span class="badge badge-danger">{{ $item->status }}</span></td>
                                         @endif
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        @if (Auth::user()->hasRole('admin|staff'))
                                        <a href="{{ url('admin/transaksi/detail/'.$item->id) }}" class="btn btn-icon icon-left btn-info"><i class="far fa-eye"></i> Lihat</a>
                                        @else
                                        <a href="{{ url('pemilik_kost/transaksi/detail/'.$item->id) }}" class="btn btn-icon icon-left btn-info"><i class="far fa-eye"></i> Lihat</a>
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
