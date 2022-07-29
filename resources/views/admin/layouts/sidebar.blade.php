<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          @if (Auth::user()->hasRole('admin|staff'))
          <div class="sidebar-brand">
            <a href="{{ url('admin/dashboard') }}">Kostan.id</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('admin/dashboard') }}">K</a>
          </div>
          @else
          <div class="sidebar-brand">
            <a href="{{ url('pemilik_kost/dashboard') }}">Kostan.id</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('pemilik_kost/dashboard') }}">K</a>
          </div>
          @endif
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              @if (Auth::user()->hasRole('admin|staff'))
              <li class="@yield('dashboard')"><a class="nav-link" href="{{ url('admin/dashboard') }}"><i class="bi bi-columns-gap"></i> <span>Dashboard</span></a></li>
               @else
               <li class="@yield('dashboard')"><a class="nav-link" href="{{ url('pemilik_kost/dashboard') }}"><i class="bi bi-columns-gap"></i> <span>Dashboard</span></a></li>
               @endif
              <li class="menu-header">Master</li>
              @if (Auth::user()->hasRole('admin|staff'))
              <li class="@yield('fasilitas')"><a class="nav-link" href="{{ url('admin/fasilitas') }}"><i class="bi bi-tv"></i></i> <span>Fasilitas</span></a></li>
              <li class="@yield('kostan')"><a class="nav-link" href="{{ url('admin/kostan') }}"><i class="bi bi-house"></i></i><span>Kostan</span></a></li>
              <li class="@yield('type_kamar')"><a class="nav-link" href="{{ url('admin/type_kamar') }}"><i class="bi bi-door-open"></i></i><span>Tipe Kamar</span></a></li>
              @else
              <li class="@yield('fasilitas')"><a class="nav-link" href="{{ url('pemilik_kost/fasilitas') }}"><i class="bi bi-tv"></i></i> <span>Fasilitas</span></a></li>
              <li class="@yield('kostan')"><a class="nav-link" href="{{ url('pemilik_kost/kostan') }}"><i class="bi bi-house"></i></i><span>Kostan</span></a></li>
              <li class="@yield('type_kamar')"><a class="nav-link" href="{{ url('pemilik_kost/type_kamar') }}"><i class="bi bi-door-open"></i></i><span>Tipe Kamar</span></a></li>
              @endif
              @can('media-pembayaran-list')
              <li class="@yield('media_pembayaran')"><a class="nav-link" href="{{ url('admin/media_pembayaran') }}"><i class="bi bi-wallet2"></i></i><span>Media Pembayaran</span></a></li>
              @endcan
              @if (Auth::user()->hasRole('admin|staff'))
              <li class="menu-header">Transaksi</li>
              <li class="@yield('menunggu_konfirmasi')"><a class="nav-link" href="{{ url('admin/transaksi/menunggu_konfirmasi') }}"><i class="bi bi-journal-check"></i></i> <span>Menunggu Konfirmasi Pembayaran
                @if (count(\App\Models\Transaksi::countVerif())>0)
                <span class="bg-info text-white p-1 rounded-pill">+{{ count(\App\Models\Transaksi::countVerif()) }}</span>
                @endif
                </span>
                </a>
            </li>
              <li class="@yield('pengembalian_dana')"><a class="nav-link" href="{{ url('admin/transaksi/pengembalian_dana') }}"><i class="bi bi-journal-check"></i></i> <span>Pengembalian Dana
                @if (count(\App\Models\Transaksi::countPengembalian())>0)
                <span class="bg-warning text-white p-1 rounded-pill">+{{ count(\App\Models\Transaksi::countPengembalian()) }}</span>
                @endif
                </span>
                </a>
            </li>
              <li class="@yield('transaksi')"><a class="nav-link" href="{{ url('admin/transaksi/all') }}"><i class="bi bi-journal"></i></i> <span>Semua Transaksi</span></a></li>
              @else
              <li class="menu-header">Transaksi</li>
              <li class="@yield('menunggu_konfirmasi')"><a class="nav-link" href="{{ url('pemilik_kost/transaksi/menunggu_konfirmasi') }}"><i class="bi bi-journal-check"></i> <span>Menunggu Konfirmasi
                @if (count(\App\Models\Transaksi::countVerifPemilik())>0)
                <span class="bg-info text-white p-1 rounded-pill">+{{ count(\App\Models\Transaksi::countVerifPemilik()) }}</span>
                @endif
                </span></a></li>
              <li class="@yield('dibatalkan')"><a class="nav-link" href="{{ url('pemilik_kost/transaksi/transaksi_dibatalkan') }}"><i class="bi bi-journal-x"></i> <span>Transaksi Dibatalkan</span></a></li>
              <li class="@yield('selesai')"><a class="nav-link" href="{{ url('pemilik_kost/transaksi/transaksi_selesai') }}"><i class="bi bi-journal-check"></i> <span>Transaksi Selesai</span></a></li>
              {{-- <li class="@yield('update_jumlah_kamar')"><a class="nav-link" href="{{ url('pemilik_kost/transaksi/update_jumlah_kamar') }}"><i class="fas fa-money-check-alt"></i> <span>Update Jumlah Kamar</span></a></li> --}}
              <li class="@yield('transaksi')"><a class="nav-link" href="{{ url('pemilik_kost/transaksi/all') }}"><i class="bi bi-journal"></i> <span>Semua Transaksi</span></a></li>
              @endif
              @can('user-list')
                <li class="menu-header">Users Manajemen</li>
                <li class="@yield('users')"><a class="nav-link" href="{{ url('admin/users') }}"><i class="bi bi-people"></i> <span>Users</span></a></li>
                <li class="@yield('role')"><a class="nav-link" href="{{ url('admin/role') }}"><i class="bi bi-key"></i><span>Role</span></a></li>
              @endcan
            </ul>
        </aside>
      </div>
