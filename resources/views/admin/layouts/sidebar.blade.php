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
              @can('media-pembayaran-list')
              <li class="@yield('media_pembayaran')"><a class="nav-link" href="{{ url('admin/media_pembayaran') }}"><i class="fas fa-credit-card"></i><span>Media Pembayaran</span></a></li>
              @endcan
              @can('user-list')
                <li class="menu-header">Users Manajemen</li>
                <li class="@yield('users')"><a class="nav-link" href="{{ url('admin/users') }}"><i class="fas fa-users"></i> <span>Users</span></a></li>
                <li class="@yield('role')"><a class="nav-link" href="{{ url('admin/role') }}"><i class="fas fa-user-tag"></i><span>Role</span></a></li>
                <li class="@yield('permission')"><a class="nav-link" href="{{ url('admin/permission') }}"><i class="fas fa-key"></i><span>Permission</span></a></li>
              @endcan
            </ul>
        </aside>
      </div>
