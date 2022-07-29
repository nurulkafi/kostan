@extends('landing_pages.layouts.master')
@section('header','header-v4')
@section('content')
<div class="container" style="font-family:Poppins">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="{{ url('/') }}" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			Transaksi
		</span>
	</div>
</div>
<div class="bg0 m-t-23 p-b-140" style="font-family:Poppins">
	<div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Belum Bayar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Menunggu Verifikasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-dibatalkan-tab" data-toggle="pill" href="#pills-dibatalkan" role="tab" aria-controls="pills-dibatalkan" aria-selected="false">Dibatalkan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Terkonfirmasi</a>
        </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @php
                    $no = 1;
                @endphp
                @forelse ($belum_bayar as $item)
                <div class="bg0 p-t-75 p-b-85">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                                <div class="m-l-25 m-r--38 m-lr-0-xl">
                                    <div class="wrap-table-shopping-cart">
                                        <table class="table-shopping-cart">
                                            <tr class="table_head">
                                                <th class="column-1">Kode</th>
                                                <th class="column-1">Kostan</th>
                                                <th class="column-1">Foto</th>
                                                <th class="column-1">Harga</th>
                                                <th class="column-1">Lama Sewa</th>
                                                <th class="column-1">Total</th>
                                                <th class="column-1">Status</th>
                                            </tr>

                                            <tr class="table_row">
                                                <td class="column-1">{{$item->kode_transaksi}}</td>
                                                <td class="column-1">{{ $item->kostan($item->tipe_kamar_id) }}</td>
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ asset($item->foto_kostan($item->tipe_kamar_id)) }}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-1">
                                                    Rp. {{ number_format($item->harga($item->tipe_kamar_id),0,'','.') }}
                                                <td class="column-1">{{ $item->lama_sewa }} Bulan</td>
                                                <td class="column-1">
                                                    Rp. {{ number_format($item->jumlah_pembayaran,0,'','.') }}
                                                <td class="column-1">{{ $item->status }}</td>
                                            </tr>
                                            <tr class="table-row ">
                                                <th class="column-1"></th>
                                                <th class="column-1"></th>
                                                <th class="column-1"></th>
                                                <th class="column-1"></th>
                                                <th class="column-1"></th>
                                                <th class="column-1">
                                                    <form action="{{ url('pembayaran/cancel/'.$item->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger m-2">
                                                        Batalkan
                                                        </button>
                                                    </form>
                                                </th>
                                                <th class="column-1"><a href="{{ url('pembayaran/'.$item->id) }}" class="btn btn-info m-2">
                                                 Bayar
                                                </a></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">Belum Ada Data Pembayaran</div>
                </div>
                @endforelse
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @php
                    $no = 1;
                @endphp
                @forelse ($menunggu as $item)
                <form class="bg0 p-t-75 p-b-85">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                                <div class="m-l-25 m-r--38 m-lr-0-xl">
                                    <div class="wrap-table-shopping-cart">
                                        <table class="table-shopping-cart">
                                            <tr class="table_head">
                                                <th class="column-1">Kode</th>
                                                <th class="">Kostan</th>
                                                <th class="">Foto</th>
                                                <th class="">Harga</th>
                                                <th class="">Lama Sewa</th>
                                                <th class="">Total</th>
                                                <th class="">Status</th>
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
                                                <td class="">
                                                    Rp. {{ number_format($item->jumlah_pembayaran,0,'','.') }}
                                                <td class=""><span class="badge badge-pill badge-success">{{ $item->status }}</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @empty
                <div class="card">
                    <div class="card-body">Belum Ada Data Transaksi</div>
                </div>
                @endforelse
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                @php
                    $no = 1;
                @endphp
                @forelse ($terkonfirmasi as $item)
                <div class="bg0 p-t-75 p-b-85">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                                <div class="m-l-25 m-r--38 m-lr-0-xl">
                                    <div class="wrap-table-shopping-cart">
                                        <table class="table-shopping-cart">
                                            <tr class="table_head">
                                                <th class="column-1">Kode</th>
                                                <th class="column-1">Kostan</th>
                                                <th class="column-1">Foto</th>
                                                <th class="column-1">Harga</th>
                                                <th class="column-1">Lama Sewa</th>
                                                <th class="column-1">Total</th>
                                                <th class="column-1">Status</th>
                                            </tr>

                                            <tr class="table_row">
                                                <td class="column-1">
                                                    {{$item->kode_transaksi}}
                                                </td>
                                                <td class="column-1">{{ $item->kostan($item->tipe_kamar_id) }}</td>
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ asset($item->foto_kostan($item->tipe_kamar_id)) }}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-1">
                                                    Rp. {{ number_format($item->harga($item->tipe_kamar_id),0,'','.') }}
                                                <td class="column-1">{{ $item->lama_sewa }} Bulan</td>
                                                <td class="column-1">
                                                    Rp. {{ number_format($item->jumlah_pembayaran,0,'','.') }}
                                                <td class="column-1"><span class="badge badge-pill badge-success">{{ $item->status }}</span></td>
                                            </tr>
                                            @if (count(App\Models\Review::cek($item->id)) < 1)
                                            <form action="{{ url('reviews/'.$item->id) }}" method="post">
                                                @csrf
                                            <tr class="table_row">
                                                <td class="column-1" colspan="3">
                                                    <span class="stext-102 cl3 m-r-16">
													Your Rating :
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
													<label class="stext-102 cl3" for="review">Your review : </label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                </td>
                                                <td class="column-1" >
                                                    <button class="btn btn-primary">Submit</button>
                                                </td>
                                            </tr>
                                            @endif
                                            </form>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">Belum Ada Data Transaksi</div>
                </div>
                @endforelse
            </div>
            <div class="tab-pane fade" id="pills-dibatalkan" role="tabpanel" aria-labelledby="pills-dibatalkan-tab">
                @php
                    $no = 1;
                @endphp
                @forelse ($dibatalkan as $item)
                <form class="bg0 p-t-75 p-b-85">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                                <div class="m-l-25 m-r--38 m-lr-0-xl">
                                    <div class="wrap-table-shopping-cart">
                                        <table class="table-shopping-cart">
                                            <tr class="table_head">
                                                <th class="column-1">Kode</th>
                                                <th class="column-1">Kostan</th>
                                                <th class="column-1">Foto</th>
                                                <th class="column-1">Harga</th>
                                                <th class="column-1">Lama Sewa</th>
                                                <th class="column-1">Total</th>
                                                <th class="column-1">Status</th>
                                            </tr>

                                            <tr class="table_row">
                                                <td class="column-1">
                                                    {{$item->kode_transaksi}}
                                                </td>
                                                <td class="column-1">{{ $item->kostan($item->tipe_kamar_id) }}</td>
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ asset($item->foto_kostan($item->tipe_kamar_id)) }}" alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-1">
                                                    Rp. {{ number_format($item->harga($item->tipe_kamar_id),0,'','.') }}
                                                <td class="column-1">{{ $item->lama_sewa }} Bulan</td>
                                                <td class="column-1">
                                                    Rp. {{ number_format($item->jumlah_pembayaran,0,'','.') }}
                                                <td class="column-1"><span class="badge badge-pill badge-danger">{{ $item->status }}</span></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                        <div class="flex-w flex-m m-r-20 m-tb-5">
                                            Status Pengembalian Dana : <span class="m-l-18 badge badge-pill badge-info">{{ $item->keterangan }}</span>
                                        </div>

                                        {{-- <a href="{{ url('pembayaran/'.$item->id) }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                            Bayar
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @empty
                <div class="card">
                    <div class="card-body">Belum Ada Data Transaksi</div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
