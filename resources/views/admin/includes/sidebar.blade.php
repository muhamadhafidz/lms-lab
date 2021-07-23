<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('assets/admin/img/logo.png') }}" class="img-fluid" >
      {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 mb-3 d-flex justify-content-center">
        <div class="alert alert-light py-1 w-50 text-center" role="alert">
          {{ ucfirst(Auth::user()->roles) }}
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('admin/profil*') ? 'active' : '' }}" href="{{ route('admin.profil.index') }}">
              <i class="nav-icon far fa-id-card"></i>
              <p>
                Profil
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('admin/berita-acara*') ? 'active' : '' }}" href="{{ route('admin.berita-acara.index') }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Praktikum
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('admin/absensi*') ? 'active' : '' }}" href="{{ route('admin.absensi.index') }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Absensi Asisten
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @if (Auth::user()->roles == 'staf')
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin/kelas*') ? 'active' : '' }}" href="{{ route('admin.kelas.index') }}">
                  <i class="fas fa-sitemap nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin/matkul*') ? 'active' : '' }}" href="{{ route('admin.matkul.index') }}">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Matkul</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin/asisten*') ? 'active' : '' }}" href="{{ route('admin.asisten.index') }}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Asisten</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin/jadwal*') ? 'active' : '' }}" href="{{ route('admin.jadwal.index') }}">
                  <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>Jadwal</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin/rekap-absensi*') ? 'active' : '' }}" href="{{ route('admin.rekap-absensi.index') }}">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Rekap Absensi</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>