        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-text mx-3">PURNAMA INVENTORY</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('/') || request()->is('dashboard')) ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-desktop"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                barang master
            </div>

            <!-- Nav Item - Tables -->

            <li class="nav-item {{ (request()->is('users*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('listuser') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Halaman User</span></a>
            </li>
            
            <li class="nav-item {{ (request()->is('product*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('listproduct') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Halaman Barang</span></a>
            </li>
            
            <li class="nav-item {{ (request()->is('transaksi*')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('listtrans') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Halaman Transaksi</span></a>
            </li>
            
            {{-- <li class="nav-item {{ (request()->is('products*')) ? 'active' : '' }}">
                <a class="nav-link" href="/products">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Data Barang</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Log Out -->
            <li class="nav-item">
                <form action="{{ route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-md nav-link">Logout</button>
                </form>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        