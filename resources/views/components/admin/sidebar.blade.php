<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item has-sub {{ request()->is('admin/data-admin*', 'admin/data-anggota*') ? 'active' : '' }}">
        <a href="#" class="sidebar-link">
            <i class="bi bi-stack"></i>
            <span>Data Anggota</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item {{ request()->is('admin/data-admin*') ? 'active' : '' }}">
                <a href="{{ route('admin.data_admin') }}">Admin</a>
            </li>
            <li class="submenu-item {{ request()->is('admin/data-anggota*') ? 'active' : '' }}">
                <a href="{{ route('admin.data_anggota') }}">Anggota</a>
            </li>

        </ul>
    </li>

    <li
        class="sidebar-item has-sub {{ request()->is('admin/penerbit*', 'admin/kategori*', 'admin/buku') ? 'active' : '' }}">
        <a href="#" class="sidebar-link">
            <i class="bi bi-stack"></i>
            <span>Data Buku</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item {{ request()->is('admin/penerbit*') ? 'active' : '' }}">
                <a href="{{ route('admin.penerbit') }}">Penerbit</a>
            </li>
            <li class="submenu-item {{ request()->is('admin/kategori*') ? 'active' : '' }}">
                <a href="{{ route('admin.kategori') }}">Kategori</a>
            </li>
            <li class="submenu-item {{ request()->is('admin/buku*') ? 'active' : '' }}">
                <a href="{{ route('admin.buku') }}">Buku</a>
            </li>
        </ul>
    </li>

    <li
        class="sidebar-item has-sub {{ request()->is('admin/laporan/peminjaman*', 'admin/laporan/pengembalian*', 'admin/laporan/anggota*') ? 'active' : '' }}">
        <a href="#" class="sidebar-link">
            <i class="bi bi-stack"></i>
            <span>Laporan</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item {{ request()->is('admin/laporan/peminjaman*') ? 'active' : '' }}">
                <a href="{{ route('admin.laporan_peminjaman') }}">Peminjaman</a>
            </li>
            <li class="submenu-item {{ request()->is('admin/laporan/pengembalian*') ? 'active' : '' }}">
                <a href="{{ route('admin.laporan_pengembalian') }}">Pengembalian</a>
            </li>
            <li class="submenu-item {{ request()->is('admin/laporan/anggota*') ? 'active' : '' }}">
                <a href="{{ route('admin.laporan_anggota') }}">Anggota</a>
            </li>

        </ul>
    </li>

    <hr />

    <li class="sidebar-item {{ request()->is('admin/identitas-aplikasi*') ? 'active' : '' }}">
        <a href="{{ route('admin.identitas_aplikasi') }}" class="sidebar-link">
            <i class="bi bi-info-circle-fill"></i>
            <span>Identitas Aplikasi</span>
        </a>
    </li>

    <li
        class="sidebar-item has-sub {{ request()->is('admin/pesan-masuk*', 'admin/pesan-terkirim*') ? 'active' : '' }}">
        <a href="#" class="sidebar-link">
            <i class="bi bi-envelope-fill"></i>
            <span>Pesan</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item {{ request()->is('admin/pesan-masuk*') ? 'active' : '' }}">
                <a href="{{ route('admin.pesan_masuk') }}">Pesan Masuk</a>
            </li>
            <li class="submenu-item {{ request()->is('admin/pesan-terkirim*') ? 'active' : '' }}">
                <a href="{{ route('admin.pesan_terkirim') }}">Pesan Terkirim</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item {{ request()->is('admin/pemberitahuan*') ? 'active' : '' }}">
        <a href="{{ route('admin.pemberitahuan_admin') }}" class="sidebar-link">
            <i class="bi bi-bell-fill"></i>
            <span>Pemberitahuan</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('admin/profil*') ? 'active' : '' }}">
        <a href="{{ route('admin.profil') }}" class="sidebar-link">
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
