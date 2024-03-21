<li class="menu-header">SID</li>
<li class="nav-item dropdown {{ Request::is('desa*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-wrench"></i><span>Seting</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('desa') ? 'active' : '' }}">
            <a href="{{ route('desa.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Nama
                    Desa</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>User
                    Pengguna</span></a>
        </li>
        <li class="nav-item {{ Request::is('category') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}" class="nav-link "><i
                    class="fas fa-ellipsis-v"></i><span>Sinkronisasi Data</span></a>
        </li>
        <li class="nav-item {{ Request::is('category') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Backup
                    Data</span></a>
        </li>
        <li class="nav-item {{ Request::is('category') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Restore
                    Data</span></a>
        </li>
    </ul>
</li>

{{-- <li class="menu-header">Entry Data</li> --}}
<li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Adm. Umum</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Tanah Kas 
                    Desa</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Tanah di Desa</span></a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Adm. Penduduk</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Data Induk Penduduk</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Mutasi Penduduk</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Rekap Jumlah Penduduk</span></a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-balance-scale"></i><span>Adm. Keuangan</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>RPJM Desa</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>RKP Desa</span></a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>Surat Menyurat</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Pernyataan Domisili</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Pernyataan Ahli Waris
            </span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Pernyataan Umum</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Pengantar Ijin Keramaian</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Pengantar SKCK</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Pengantar Umum</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Ket. Domisili Usaha</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Ket. Tidak Mampu</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Ket. Umum</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Ket. Domisili Tmp. Tinggal</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Ket. Usaha</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Kategori Surat</span></a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Profil Desa</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Administratif</span></a>
        </li>
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Sarana Kantor</span></a>
        </li>
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Sarana Pendidikan</span></a>
        </li>
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Sarana Kesehatan</span></a>
        </li>
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Lembaga</span></a>
        </li>
    </ul>
</li>
<li class="menu-header">Data Dasar Keluarga</li>
<li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Kepala Keluarga</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Personil</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Kepemilikan Rumah</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Sumber Air Minum</span></a>
        </li>
        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
            <a href="{{ route('artikel.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Aset Transportasi</span></a>
        </li>
    </ul>
</li>
<li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Anggota Keluarga</span></a>
    <ul class="dropdown-menu">
        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
            <a href="{{ route('halaman.index') }}" class="nav-link "><i class="fas fa-ellipsis-v"></i><span>Personil</span></a>
        </li>
    </ul>
</li>

