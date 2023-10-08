<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="">Perpustakaan Kami</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="">Perpus</a>
    </div>
    <ul class="sidebar-menu">
        @section('sidebar')
            <li class="menu-header">Dashboard</li>
            <li class=""><a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Peminjaman Buku</span></a></li>
            <li class=""><a href="/cart" class="nav-link"><i class="fas fa-columns"></i><span>Keranjang Peminjaman</span></a></li>
            <li class=""><a href="/peminjam" class="nav-link"><i class="far fa-square"></i><span>Data Peminjaman</span></a></li>
            <li class=""><a href="/logout" class="nav-link"><i class="nav-icon fas  fa-sign-out-alt"></i><span>Logout</span></a></li>
        @show
      </ul>
  </aside>
