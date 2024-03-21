<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">{{ klien('nama_client') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}"><i class="fa fa-store"></i></a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item ">
                <a href="{{ route('dashboard') }}" class="nav-link "><i
                        class="fas fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            @if (auth()->user()->getRoleNames()[0] === 'admin')
            @include('components.sid-menu')
                <li class="menu-header">Website</li>
                <li class="nav-item dropdown {{ Request::is('halaman*', 'category*', 'artikel*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i
                            class="fas fa-thumb-tack"></i><span>Posting</span></a>
                    <ul class="dropdown-menu">
                        <li class="nav-item {{ Request::is('halaman') ? 'active' : '' }}">
                            <a href="{{ route('halaman.index') }}" class="nav-link "><i
                                    class="fas fa-file"></i><span>Halaman</span></a>
                        </li>
                        <li class="nav-item {{ Request::is('artikel') ? 'active' : '' }}">
                            <a href="{{ route('artikel.index') }}" class="nav-link "><i
                                    class="fas fa-newspaper"></i><span>Artikel</span></a>
                        </li>
                        <li class="nav-item {{ Request::is('category') ? 'active' : '' }}">
                            <a href="{{ route('category.index') }}" class="nav-link "><i
                                    class="fas fa-ellipsis-h"></i><span>Kategori Artikel</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="nav-item dropdown {{ Request::is('galeri*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-image"></i><span>Galeri</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item {{ Request::is('galeri-foto') ? 'active' : '' }}">
                        <a href="{{ route('galeri-foto.index') }}" class="nav-link "><i
                                class="fas fa-camera"></i><span>Foto</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('galeri-video') ? 'active' : '' }}">
                        <a href="{{ route('galeri-video.index') }}" class="nav-link "><i
                                class="fas fa-play"></i><span>Video</span></a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item dropdown {{ Request::is('admin-struktur*', 'admin-perangkat*', 'admin-lembaga*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i
                        class="fas fa-archway"></i><span>Pemerintahan</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item {{ Request::is('admin-struktur-organisasi') ? 'active' : '' }}">
                        <a href="{{ route('admin-struktur-organisasi.index') }}" class="nav-link "><i
                                class="fas fa-ellipsis-h"></i><span>Struktur Organisasi</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('admin-perangkat-desa') ? 'active' : '' }}">
                        <a href="{{ route('admin-perangkat-desa.index') }}" class="nav-link "><i
                                class="fas fa-ellipsis-h"></i><span>Perangkat Desa</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('admin-lembaga-desa') ? 'active' : '' }}">
                        <a href="{{ route('admin-lembaga-desa.index') }}" class="nav-link "><i
                                class="fas fa-ellipsis-h"></i><span>Lembaga Desa</span></a>
                    </li>
                </ul>
            </li>
            <li class="menu-header">SID</li>
            <li class="nav-item {{ Request::is('hlm-sid') ? 'active' : '' }}">
                <a href="{{ route('hlm-sid.index') }}" class="nav-link "><i
                        class="fas fa-file"></i><span>Posting</span></a>
            </li>


            @if (auth()->user()->roles == 'superadmin' || auth()->user()->username == 'admin')
                <li class="menu-header">Admin only</li>

                <li class="nav-item {{ Request::is('profil*') ? 'active' : '' }}">
                    <a href="{{ route('profil-bisnis.edit', auth()->user()->perusahaan_id) }}" class="nav-link "><i
                            class="fas fa-home"></i><span>Profil</span></a>
                </li>
                <li class="nav-item {{ Request::is('slidebanner*') ? 'active' : '' }}">
                    <a href="{{ route('slidebanner.index') }}" class="nav-link "><i
                            class="fas fa-image"></i><span>Slide Banner</span></a>
                </li>
                <li class="nav-item {{ Request::is('user*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="nav-link "><i class="fas fa-users"></i><span>User
                            List</span></a>
                </li>
            @endif
            <li class="nav-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="nav-link "><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
            </li>
    </aside>
</div>
