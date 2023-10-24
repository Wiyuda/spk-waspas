<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div>
          <img src="{{ url('assets/library/sbadmin/img/logo.png') }}" alt="Logo" width="50px">
      </div>
      <div class="sidebar-brand-text mx-3">SPK WASPAS</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>

      <a class="nav-link" href="{{ route('karyawan.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Karyawan</span>
      </a>
      <a class="nav-link" href="{{ route('penilaian.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Penilaian Karyawan</span>
      </a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


</ul>