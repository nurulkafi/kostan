<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <style>
        table, td, th {
  border: 1px solid;
  padding: 2px;
}

table {
  width: 100%;
  border-collapse: collapse;
  padding: 2px;
}
    </style>
</head>

<body>
    <table class="table table-bordered mt-5">
        <tr>
            <th>No</th>
            <th>Kode Transaksi</th>
            <th>Nama Kostan</th>
            <th>Nama Tipe Kamar</th>
            <th>Nama Pemilik Kostan</th>
            <th>Nama Penyewa Kostan</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Harga Kostan</th>
            <th>Lama Sewa</th>
            <th>Total Pembayaran</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kode_transaksi }}</td>
            <td>{{ $item->kostann($item->tipe_kamar_id)->nama }}</td>
            <td>{{ $item->tipe_kamar($item->tipe_kamar_id)->nama }}</td>
            <td>{{ $item->pemilik_kostann($item->tipe_kamar_id)->nama }}</td>
            <td>{{ $item->penyewaa($item->penyewa_id)->nama }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ number_format($item->tipe_kamar($item->tipe_kamar_id)->harga,0,'','.') }}</td>
            <td>{{ $item->lama_sewa }} Bulan</td>
            <td>
                @if ($item->status == App\Models\Transaksi::Terkonfirmasi)
                {{ number_format($item->jumlah_pembayaran,0,'','.') }}
                @else
                -
                @endif
            </td>
        </tr>
        @endforeach
        <tr >
            <td colspan="9" style="border-left: 0px solid"></td>
            <td style="border-left: 0px solid">Total Pendapatan </td>
            <td  style="border-left: 0px solid">{{ number_format(\App\Models\Transaksi::jumlah_pendapatan(),0,'','.') }}</td>
        </tr>
    </table>
</body>

</html>
