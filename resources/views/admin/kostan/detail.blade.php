@extends('admin.layouts.master')
@section('kostan','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Kostan</h1>
    </div>
    <div class="p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Informasi Kostan</div>
                    <div class="card-body">
                        <p>
                        <div class="row">
                            <div class="col-4">Nama Kostan</div>
                            <div class="col-1">:</div>
                            <div class="col-6">{{ $data->nama }}</div>
                        </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Gender</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->gender }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Deskripsi</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{!! $data->deskripsi !!}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Kabupaten / Kota</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->kabupaten($data->id)->title}}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Alamat Lengkap</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{  $data->alamat->alamat_lengkap  }}</div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Foto Kostan</div>
                    <div class="card-body">
                        @foreach ($data->foto as $item)
                            <img src="{{ asset($item->path) }}" width="150px" height="150px" alt=""
                                        class="img-thumbnail">
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                <div class="card-header"><h5>Tipe Kamar</h5></div>
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
                                <th>Peraturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach (\App\Models\TypeKamar::typekamar($data->id) as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->ukuran_kamar }}</td>
                                <td>{{ number_format($item->harga, 0, '', '.'), }}</td>
                                <td>{{ $item->jumlah_kamar }}</td>
                                <td>
                                    {!! $item->peraturan !!}
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
    </div>


    <div class="section-body">
    </div>

</section>
@endsection
