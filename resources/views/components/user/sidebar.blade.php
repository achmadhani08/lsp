<ul class="menu">
    <li class="sidebar-title mt-0">Menu</li>

    <li class="sidebar-item {{ request()->is('user/dashboard*') ? 'active' : '' }}">
        <a href="{{ route('user.dashboard') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-title">Master Data</li>

    <li class="sidebar-item has-sub {{ request()->is('user/peminjaman*', 'user/pengembalian*') ? 'active' : '' }}">
        <a href="#" class="sidebar-link">
            <i class="bi bi-stack"></i>
            <span>Data Buku</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item {{ request()->is('user/peminjaman*') ? 'active' : '' }}">
                <a href="{{ route('user.peminjaman') }}">Peminjaman</a>
            </li>
            <li class="submenu-item {{ request()->is('user/pengembalian*') ? 'active' : '' }}">
                <a href="{{ route('user.pengembalian') }}">Pengembalian</a>
            </li>

        </ul>
    </li>

    <li class="sidebar-title">Pesan & Notifikasi</li>

    <li class="sidebar-item has-sub {{ request()->is('user/pesan-masuk*', 'user/pesan-terkirim*') ? 'active' : '' }}">
        <a href="#" class="sidebar-link">
            <i class="bi bi-envelope-fill"></i>
            <span>Pesan</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item {{ request()->is('user/pesan-masuk*') ? 'active' : '' }}">
                <a href="{{ route('user.pesan_masuk') }}">Pesan Masuk</a>
            </li>
            <li class="submenu-item {{ request()->is('user/pesan-terkirim*') ? 'active' : '' }}">
                <a href="{{ route('user.pesan_terkirim') }}">Pesan Terkirim</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item {{ request()->is('user/pemberitahuan*') ? 'active' : '' }}">
        <a href="{{ route('user.pemberitahuan_user') }}" class="sidebar-link">
            <i class="bi bi-bell-fill"></i>
            <span>Pemberitahuan</span>
        </a>
    </li>

    <hr>

    <li class="sidebar-item {{ request()->is('user/profil*') ? 'active' : '' }}">
        <a href="{{ route('user.profil') }}" class="sidebar-link">
            <i class="bi bi-person-badge-fill"></i>
            <span>Profil</span>
        </a>
    </li>
</ul>
<ul class="menu">
    <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i
                class="icon-mid bi bi-box-arrow-left me-2"></i>
            Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
