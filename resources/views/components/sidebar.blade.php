<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Klinik Sehat</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}"><i class="fa fa-store"></i></a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item ">
                <a href="{{ route('dashboard') }}" class="nav-link "><i
                        class="fas fa-dashboard"></i><span>Dashboard</span></a>
            </li>
                {{-- <li class="menu-header">Admin only</li> --}}

                {{-- <li class="nav-item {{ Request::is('profil*') ? 'active' : '' }}">
                    <a href="{{ route('profil-bisnis.edit', auth()->user()->perusahaan_id) }}" class="nav-link "><i
                            class="fas fa-home"></i><span>Profil Klinik</span></a>
                </li> --}}
                <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link "><i class="fas fa-users"></i><span>User List</span></a>
                </li>
            <li class="nav-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="nav-link "><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="post">@csrf</form>
            </li>
    </aside>
</div>
