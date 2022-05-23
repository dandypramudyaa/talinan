<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">TA LINAN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (auth()->user()->roles == 'Admin')
        <li class="nav-item  @if(!empty($active_page) && $active_page == 'dashboard') active @endif">
            <a class="nav-link" href="{{ route('admins.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    @endif
    
    @if (auth()->user()->roles == 'Petugas')
        <li class="nav-item  @if(!empty($active_page) && $active_page == 'dashboard') active @endif">
            <a class="nav-link" href="{{ route('petugas.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    @if (auth()->user()->roles == 'Admin')
        <li class="nav-item @if(!empty($active_page) && $active_page == 'laporan_banjir') active @endif">
            <a class="nav-link" href="{{ route('admins.laporan-banjir.index') }}">
                <i class="fas fa-fw fa-water"></i>
                <span>Laporan Banjir</span>
            </a>
        </li>
        <li class="nav-item @if(!empty($active_page) && $active_page == 'bantuan_donasi') active @endif">
            <a class="nav-link" href="{{ route('admins.donasi-bantuan-banjir.index') }}">
                <i class="fas fa-fw fa-money-bill"></i>
                <span>Bantuan Donasi</span>
            </a>
        </li>
        <li class="nav-item @if(!empty($active_page) && $active_page == 'artikel') active @endif">
            <a class="nav-link" href="{{ route('admins.artikel.index') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Artikel</span>
            </a>
        </li>
        <li class="nav-item @if(!empty($active_page) && $active_page == 'petugas') active @endif">
            <a class="nav-link" href="{{ route('admins.petugas.index') }}">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Petugas</span>
            </a>
        </li>
        <li class="nav-item @if(!empty($active_page) && $active_page == 'users') active @endif">
            <a class="nav-link" href="{{ route('admins.users.index') }}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Users</span>
            </a>
        </li>
    @endif

    @if (auth()->user()->roles == 'Petugas')
        <li class="nav-item @if(!empty($active_page) && $active_page == 'laporan_banjir') active @endif">
            <a class="nav-link" href="{{ route('petugas.laporan-banjir.index') }}">
                <i class="fas fa-fw fa-water"></i>
                <span>Laporan Banjir</span>
            </a>
        </li>
    @endif

</ul>
<!-- End of Sidebar -->