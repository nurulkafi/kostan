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
            <th>Nama Kostan</th>
            <th>Nama Tipe Kamar</th>
            <th>Ukuran Kamar</th>
            <th>Peraturan Kamar</th>
            <th>Harga</th>
            <th>Jumlah Kamar</th>
            <th>Fasilitas</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->kost($item->kostan_id)->nama }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->ukuran_kamar }}</td>
            <td>{!! $item->peraturan !!}</td>
            <td>{{ $item->harga }}</td>
            <td>{{  $item->jumlah_kamar  }}</td>
            <td>
                <ol>
                @foreach ($item->fasilitas as $fasilitas)
                    <li>{{ $fasilitas->fasilitas->nama }}</li>
                @endforeach
                </ol>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>
