<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">SIM Spp</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">SPP</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link ">
              <i class="fas fa-fire"></i>
              <span>Dashboard</span>
            </a>
          </li>

            <li class="menu-header">Data Master</li>
            @if (auth()->user()->level=="admin")
            <li class="nav-item dropdown {{ Request::is('user', 'create_user') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('user') }}" class="nav-link">
                <i class="fas fa-user-secret"></i> 
                <span>Petugas</span>
              </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('kelas') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('kelas.index') }}" class="nav-link">
                <i class="fas fa-columns"></i> 
                <span>Data Kelas</span>
              </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('spp') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('spp.index') }}" class="nav-link">
                <i class="fas fa-clipboard-list"></i> 
                <span>Data SPP</span>
              </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('Siswa','Siswa/create') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('Siswa.index') }}" class="nav-link">
                <i class="fas fa-users"></i> 
                <span>Siswa</span>
              </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('pembayaran','pembayaran/create') ? 'sidebar-item active' : '' }}">
              <a href="{{ url('pembayaran') }}" class="nav-link">
                <i class="fas fa-comments-dollar"></i> 
                <span>Entri Transaksi</span>
              </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('history' ) ? 'sidebar-item active' : '' }}">
              <a href="{{ route('history') }}" class="nav-link">
                <i class="fas fa-history"></i> 
                <span>History Pembayaran</span>
              </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('user', 'create_user') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('laporan') }}" class="nav-link">
                <i class="fas fa-history"></i> 
                <span>Laporan</span>
              </a>
            </li>
            @endif

            @if (auth()->user()->level=="petugas")
            <li class="nav-item dropdown {{ Request::is('pembayaran','pembayaran/create') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('pembayaran.index') }}" class="nav-link">
                <i class="fas fa-comments-dollar"></i> 
                <span>Entri Transaksi</span>
              </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('history') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('history') }}" class="nav-link">
                <i class="fas fa-history"></i> 
                <span>History Pembayaran</span>
              </a>
            </li>
            @endif
            @if (auth()->user()->level=="siswa")
            <li class="nav-item dropdown {{ Request::is('history') ? 'sidebar-item active' : '' }}">
              <a href="{{ route('history') }}" class="nav-link">
                <i class="fas fa-history"></i> 
                <span>History Pembayaran</span>
              </a>
            </li>
            @endif
        </ul>
    </aside>
  </div>
