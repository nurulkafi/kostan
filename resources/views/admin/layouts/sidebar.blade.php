<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="@yield('dashboard')"><a class="nav-link" href="blank.html"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Master</li>
              <li class="@yield('fasilitas')"><a class="nav-link" href="{{ url('admin/fasilitas') }}"><i class="fas fa-couch"></i> <span>Fasilitas</span></a></li>
              <li class="@yield('kostan')"><a class="nav-link" href="{{ url('admin/kostan') }}"><i class="fas fa-city"></i><span>Kostan</span></a></li>
              <li class="@yield('type_kamar')"><a class="nav-link" href="{{ url('admin/type_kamar') }}"><i class="fas fa-bed"></i><span>Tipe Kamar</span></a></li>
              <li class="@yield('media_pembayaran')"><a class="nav-link" href="{{ url('admin/media_pembayaran') }}"><i class="fas fa-credit-card"></i><span>Media Pembayaran</span></a></li>

            </ul>
        </aside>
      </div>
