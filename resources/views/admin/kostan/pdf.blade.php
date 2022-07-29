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
            <th>Gender</th>
            <th>Deskripsi</th>
            <th>Provinsi</th>
            <th>Kabupaten / Kota</th>
            <th>Alamat Lengkap</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($data as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->gender }}</td>
            <td>{!! $item->deskripsi !!}</td>
            <td>{{ $item->alamat->kabupaten->provinsi->title}}</td>
            <td>{{ $item->alamat->kabupaten->title}}</td>
            <td>{{  $item->alamat->alamat_lengkap  }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
