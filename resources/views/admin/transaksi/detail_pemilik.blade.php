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
                        @if ($data->status == \App\Models\Transaksi::Menunggu_pemilik)
                        <p>
                            <form action="{{ url('pemilik_kost/transaksi/'.$data->id) }}" method="post">
                            <div class="row">
                                <div class="col-3 mt-2"><span class="badge badge-danger">Alasan( Jika Ditolak )</span></div>
                                <div class="col-1 mt-2">:</div>
                                <div class="col-6">
                                    <select name="keterangan" required id="kostan" class="custom-select">
                                        <option selected>-- Pilih Alasan --</option>
                                        <option value="gender tidak sesuai">Gender Tidak Sesuai</option>
                                        <option value="kostan penuh">Kostan Penuh</option>
                                    </select>
                                </div>
                            </div>
                        </p>
                        <div class="float-right">
                            <div class="row">
                                    @csrf
                                    <button type="submit" name="button" value="tolak" class="btn btn-danger m-2">Tolak</button>
                                </form>
                                <form action="{{ url('pemilik_kost/transaksi/'.$data->id) }}" method="post">
                                    @csrf
                                    <button type="submit" name="button" value="terima" class="btn btn-primary m-2">Terima</button>
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
