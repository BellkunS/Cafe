<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-coffee"></i>
        </div>
        <div class="sidebar-divider"> 
            <label class="sidebar-brand-text mx-3">CAFE IRHAB</label> 
        </div>
    </a>
    <?php if(session()->role == 'admin'): ?>
        <hr class="sidebar-divider ">
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

        <hr class="sidebar-divider ">
    <li class="nav-item active">
        <a class="nav-link" href="/user">
        <i class="fas fa-user-alt"></i>
        <span>User</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/menu">
        <i class="fas fa-hamburger"></i>
        <span>Menu</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/pesan">
        <i class="fas fa-cart-plus"></i>
        <span>Pesanan</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/laporan">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Laporan</span></a>
    </li>
    <?php endif;?>
    <?php if (session()->role == 'kasir') :?>
        <hr class="sidebar-divider ">
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
   
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/pesan">
        <i class="fas fa-cart-plus"></i>
        <span>Pesanan</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/laporan">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Laporan</span></a>
    </li>
    <?php endif;?>

    <?php if (session()->role == 'manager') :?>
        <hr class="sidebar-divider ">
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/menu">
        <i class="fas fa-hamburger"></i>
        <span>Menu</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/pesan">
        <i class="fas fa-cart-plus"></i>
        <span>Pesanan</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item active">
        <a class="nav-link" href="/laporan">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Laporan</span></a>
    </li>
    <?php endif;?>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>