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
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.profil.index') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>Profil</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.berita-acara.index') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Berita Acara</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.absensi.index') }}">
                    <i class="nc-icon nc-notes"></i>
                    <p>Absen</p>
                </a>
            </li>
            {{-- <li>
                <a class="nav-link" href="./typography.html">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="./icons.html">
                    <i class="nc-icon nc-atom"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="./maps.html">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="./notifications.html">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="nav-item active-pro">
                <a class="nav-link active" href="upgrade.html">
                    <img class="img-fluid" src="{{ asset('assets/image/logo.png') }}" alt="">
                </a>
            </li> --}}
        </ul>
    </div>
</div>