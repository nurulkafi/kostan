@extends('admin.layouts.master')
@section('dashboard','active')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary text-white" style="font-size: 40px">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Menunggu Konfirmasi</h4>
                        </div>
                        @if (Auth::user()->hasRole('admin|staff'))
                        <div class="card-body">
                            +{{ count(\App\Models\Transaksi::countVerif()) }}
                        </div>
                        @else
                        <div class="card-body">
                            +{{ count(\App\Models\Transaksi::countVerifPemilik()) }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info text-white" style="font-size: 40px">
                        <i class="bi bi-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi Sukses</h4>
                        </div>
                        <div class="card-body">
                            {{ count(\App\Models\Transaksi::transaksi_success()) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success text-white" style="font-size: 40px">
                        <i class="bi bi-cash"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pendapatan</h4>
                        </div>
                        <div class="card-body">
                           Rp {{ number_format(\App\Models\Transaksi::jumlah_pendapatan(),0,'','.') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger text-white" style="font-size: 40px">
                        <i class="bi bi-house"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kostan</h4>
                        </div>
                        <div class="card-body">
                            {{ count(\App\Models\Kostan::count()) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info text-white" style="font-size: 40px">
                        <i class="bi bi-door-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Tipe Kamar</h4>
                        </div>
                        <div class="card-body">
                            {{ count(\App\Models\TypeKamar::count()) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success text-white" style="font-size: 40px">
                        <i class="bi bi-tv"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Fasilitas</h4>
                        </div>
                        <div class="card-body">
                            {{ count(\App\Models\Fasilitas::count()) }}
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->hasRole('admin|staff'))
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary text-white" style="font-size: 40px">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pemilik Kost</h4>
                        </div>
                        <div class="card-body">
                            {{ count(\App\Models\PemilikKost::get()) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger text-white" style="font-size: 40px">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Penyewa</h4>
                        </div>
                        <div class="card-body">
                            {{ count(\App\Models\Penyewa::get()) }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Pendapatan Tahun {{ date("Y") }}</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart" style="height: 190px;margin: 35px auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Penyewaan Kost Tahun {{ date("Y") }}</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart2" style="height: 190px;margin: 35px auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
               <div class="card">
                <div class="card-header">
                    Review
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($review as $rev)
                        <div class="col-md-6">
                             <div class="card author-box card-primary">
                                <div class="card-body">
                                    <div class="author-box-left">
                                    <img alt="image" src="{{ asset($rev->foto) }}" class="rounded-circle img-thumbnail" width="100px" height="100px">
                                    <div class="clearfix"></div>
                                    </div>
                                    <div class="author-box-details">
                                    <div class="author-box-name">
                                        <a href="#">{{ $rev->penyewa }}</a>
                                    </div>
                                    <div class="author-box-job">{{ $rev->kostan }} Tipe {{ $rev->tipe }}</div>
                                    <div class="author-box-job">Rating :
                                        <span>
                                            @for ($i = 1; $i <= $rev->rating; $i++)
                                            <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </span>
                                    </div>
                                    <div class="author-box-description">
                                        <p>
                                            {{ $rev->review }}
                                        </p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
               </div>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
  chart: {
    type: 'bar'
  },
  series: [{
    name: 'Total Pendapatan Rp',
    data: [{{ $pendapatan[0] }},{{ $pendapatan[1] }},{{ $pendapatan[2] }},{{ $pendapatan[3] }},{{ $pendapatan[4] }}
            ,{{ $pendapatan[5] }},{{ $pendapatan[6] }},{{ $pendapatan[7] }},{{ $pendapatan[8] }},{{ $pendapatan[9] }}
            ,{{ $pendapatan[10] }},{{ $pendapatan[11] }}
            ]
  }],
  xaxis: {
    categories: ["January", "Februry", "March", "April",
            "May", "June", "July", "August",
            "Sepetember", "October", "November", "Desember"]
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
var options2 = {
  chart: {
    type: 'bar'
  },
  series: [{
    name: 'Total Kostan Tersewa',
    data: [{{ $total_sewa[0] }},{{ $total_sewa[1] }},{{ $total_sewa[2] }},{{ $total_sewa[3] }},{{ $total_sewa[4] }}
            ,{{ $total_sewa[5] }},{{ $total_sewa[6] }},{{ $total_sewa[7] }},{{ $total_sewa[8] }},{{ $total_sewa[9] }}
            ,{{ $total_sewa[10] }},{{ $total_sewa[11] }}
            ]
  }],
  xaxis: {
    categories: ["January", "Februry", "March", "April",
            "May", "June", "July", "August",
            "Sepetember", "October", "November", "Desember"]
  }
}

var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

chart2.render();
</script>
@endsection
