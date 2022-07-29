@extends('admin.layouts.master')
@section('transaksi','active')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Transaksi </h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Informasi Kostan</div>
                    <div class="card-body">
                        <p>
                            <div class="row">
                                <div class="col-4">Nama Kostan</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->kostan($data->tipe_kamar_id) }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Harga Kostan</div>
                                <div class="col-1">:</div>
                                <div class="col-6">Rp . {{ number_format($data->harga($data->tipe_kamar_id),0,'','.') }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Gender</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->gender($data->tipe_kamar_id) }}</div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Informasi Penyewa</div>
                    <div class="card-body">
                        <div class="text-center mt-5 mb-5">
                            <img src="{{ asset($data->penyewaa($data->penyewa_id)->foto) }}" width="200px" alt="" class="thumbnail rounded">
                        </div>
                        <p>
                            <div class="row">
                                <div class="col-4">Nama Penyewa</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->penyewaa($data->penyewa_id)->nama }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Umur</div>
                                <div class="col-1">:</div>
                                @php
                                    $birthDate = new DateTime($data->penyewaa($data->penyewa_id)->tgl_lahir);
                                    $today = new DateTime("today");
                                    if ($birthDate > $today) {
                                        $y = 0;
                                    }
                                    $y = $today->diff($birthDate)->y;
                                @endphp
                                <div class="col-6">{{ $y }} Tahun</div>
                            </div>
                        </p>

                        <p>
                            <div class="row">
                                <div class="col-4">Gender</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->gender($data->tipe_kamar_id) }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">Nama Bank</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->nama_bank_pengirim }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-4">No Rekening</div>
                                <div class="col-1">:</div>
                                <div class="col-6"><b>{{ $data->no_rekening_pengirim }} </b> Nama <b>{{ $data->atas_nama_pengirim }}</b></div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Informasi Transaksi</div>
                    @php
                        date_default_timezone_set('Asia/Jakarta');

                        $date = new DateTime('now');
                        $tgl_mulai = $date->format('d-m-Y');

                        $date->modify('+'.$data->lama_sewa .'month');
                        $tgl_berakhir = $date->format('d-m-Y'); // 28-02-2017 05:13:03
                    @endphp
                    <div class="card-body">
                        <p>
                            <div class="row">
                                <div class="col-3">Kode Transaksi</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->kode_transaksi }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-3">Harga Kostan</div>
                                <div class="col-1">:</div>
                                <div class="col-6">Rp . {{ number_format($data->harga($data->tipe_kamar_id),0,'','.') }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-3">Lama Sewa</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->lama_sewa }} Bulan</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-3">Tanggal Mulai Kost</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $tgl_mulai }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-3">Tanggal Berakhir</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $tgl_berakhir }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-3">Status Transaksi</div>
                                <div class="col-1">:</div>
                                <div class="col-6">{{ $data->status }}</div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-3">Total Pembayaran</div>
                                <div class="col-1">:</div>
                                <div class="col-6">Rp.{{ number_format($data->jumlah_pembayaran,0,'','.') }}</div>
                            </div>
                        </p>
                        @if ($data->status != \App\Models\Transaksi::Menunggu_pembayaran)
                        <p>
                            <div class="row">
                                <div class="col-3">Bukti Pembayaran</div>
                                <div class="col-1">:</div>
                                <div class="col-6">
                                     <a href="{{ asset($data->bukti_pembayaran) }}" target="_blank"><img src="{{ asset($data->bukti_pembayaran) }}" alt="" class="img-thumbnail"></a>
                                </div>
                            </div>
                        </p>
                        @endif
                        @if ($data->keterangan == "Pengembalian Dana Sedang Diproses")
                        <form action="{{ url('admin/transaksi/'.$data->id) }}" method="post">
                            @csrf
                            <button class="btn btn-primary float-right mt-5" type="submit" name="button" value="pengembalian_dana">Verifikasi Pengembalian Dana</button>
                        </form>
                        @endif
                        @if ($data->status == \App\Models\Transaksi::Menunggu_verif)
                        <p>
                            <form action="{{ url('admin/transaksi/'.$data->id) }}" method="post">
                            <div class="row">
                                <div class="col-3 mt-2"><span class="badge badge-danger">Alasan( Jika Ditolak )</span></div>
                                <div class="col-1 mt-2">:</div>
                                <div class="col-6">
                                    <select name="keterangan" required id="kostan" class="custom-select">
                                        <option selected>-- Pilih Alasan --</option>
                                        <option value="pembayaran tidak masuk">Pembayaran Tidak Masuk</option>
                                        <option value="jumlah pembayaran tidak sesuai">Jumlah Pembayaran Tidak Sesuai</option>
                                    </select>
                                </div>
                            </div>
                        </p>
                        <div class="float-right">
                            <div class="row">
                                    @csrf
                                        <button type="submit" name="button" value="tolak" class="btn btn-danger m-2">Tolak</button>
                                </form>
                               <form action="{{ url('admin/transaksi/'.$data->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary  m-2" name="button" value="verifikasi">Verifikasi </button>
                                </form>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
