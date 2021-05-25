<div class="sidebar" data-color="blue" data-image="{{ asset('assets/admin/img/sidebar-4.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <div class="simple-text">
                {{ Auth::user()->roles }}
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ Request::is('admin/profil*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.profil.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Profil</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/berita-acara*') ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('admin.berita-acara.index') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Berita Acara</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/absensi*') ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('admin.absensi.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Absensi</p>
                </a>
            </li>
            
            @if (Auth::user()->roles == 'staf')
                
            <li class="nav-item m-3">
                <span class="badge badge-light w-100">Bagian Staff </span>
            </li>
            <li class="nav-item {{ Request::is('admin/kelas*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.kelas.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Kelas</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/matkul*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.matkul.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Matkul</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/asisten*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.asisten.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Asisten</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('admin/jadwal*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.jadwal.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Jadwal</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>