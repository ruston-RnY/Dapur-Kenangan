<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion nap" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
    <div class="sidebar-brand-text mx-3">Dapur Kenangan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item ">
    <a class="nav-link" href="{{ route('products.index') }}">
        <i class="fas fa-hamburger"></i>
        <span>Products</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item ">
    <a class="nav-link" href="{{ route('gallery.index') }}">
        <i class="fas fa-book"></i>
        <span>Gallery</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item ">
    <a class="nav-link" href="{{ route('transaction.index') }}">
        <i class="fas fa-cart-plus"></i>
        <span>Transaction</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
