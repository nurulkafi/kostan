@extends('landing_pages.layouts.master')
@section('header','header-v4')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url('{{ asset('landing_page/images/pembayaran.png')}}');">
    <h2 class="ltext-101 cl2 respon2 txt-center">
        Pembayaran
    </h2>
</section>
<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head" style="padding: 20px">
                                <th class="column-1">Kode Transaksi</th>
                                <th class="">Kostan</th>
                                <th class="">Foto</th>
                                <th class="">Harga</th>
                                <th class="">Lama Sewa</th>
                            </tr>

                            <tr class="table_row">
                                <td class="column-1">
                                    {{$item->kode_transaksi}}
                                </td>
                                <td class="">{{ $item->kostan($item->tipe_kamar_id) }}</td>
                                <td class="">
                                    <div class="how-itemcart1">
                                        <img src="{{ asset($item->foto_kostan($item->tipe_kamar_id)) }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="">
                                    Rp. {{ number_format($item->harga($item->tipe_kamar_id),0,'','.') }}
                                <td class="">{{ $item->lama_sewa }} Bulan</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="flex-w flex-tr">
            @if ( \App\Models\Transaksi::cek_status($id)->status != \App\Models\Transaksi::Menunggu_pembayaran)
            <div class="size-400 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <h4 class="mtext-105 cl2 txt-center p-b-30">
                    Status Pembayaran : {{ \App\Models\Transaksi::cek_status($id)->status }}
                </h4>
            </div>
            @else
            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <h4 class="mtext-105 cl2 txt-center p-b-30">
                    Media Pembayaran
                </h4>
                <div class="flex-w w-full p-b-42">
                    {{-- <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span> --}}
                    @foreach ($media as $item)
                    <div class="card p-4 m-b-20" style="font-family: Poppins">
                        <img class="card-img-top" src="{{ asset($item->logo) }}" alt="Card image cap">
                        <hr>
                        <div class="card-body">
                            <p class="card-text">Nama Bank : {{ $item->nama_bank }}</p>
                            <p class="card-text">
                                No rekening : {{ $item->no_rekening }}
                            </p>
                            <p class="card-text">
                                Atas Nama : {{ $item->atas_nama }}
                            </p>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="font-family: Poppins">
                <form action="{{ url('bukti_pembayaran/'.$id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Total Pembayaran
                    </h4>
                    <h4 class="mtext-105 cl2 txt-center p-b-30 ">
                        <b>
                        Rp. {{ number_format(\App\Models\Transaksi::total($id),0,'','.') }}
                        </b>
                    </h4>
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Bank Pengirim</label>
                        <input type="text" class="form-control" name="nama_bank" value="{{ old('nama_bank') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">No Rekening Pengirim</label>
                        <input type="text" name="no_rekening" class="form-control" id="exampleFormControlInput1" value="{{ old('no_rekening') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Atas Nama</label>
                        <input type="text" name="atas_nama"class="form-control" id="exampleFormControlInput1" value="{{ old('atas_nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Bukti Pembayaran</label>
                        <input type="file" name="photo" class="form-control" id="customFile" accept="image/*">
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Upload
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
