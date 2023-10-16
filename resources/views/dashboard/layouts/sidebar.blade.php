<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        {{-- coba --}}
        @if(!Request::is('dashboard/agendas/approved*') && Request::is('dashboard/agendas*'))
        <li class="nav-item">
          <a class="nav-link active" href="/dashboard/agendas">
            <span data-feather="calendar" class="align-text-bottom"></span>
            Agenda Kegiatan
          </a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/agendas">
            <span data-feather="calendar" class="align-text-bottom"></span>
            Agenda Kegiatan
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pengumumans*') ? 'active' : '' }}" href="/dashboard/pengumumans">
            <span data-feather="bell" class="align-text-bottom"></span>
            Pengumuman
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/articles*') ? 'active' : '' }}" href="/dashboard/articles">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Artikel
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/narasumbers') ? 'active' : '' }}" href="/dashboard/narasumbers">
            <span data-feather="archive" class="align-text-bottom"></span>
            Permintaan Narasumber
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kunjungans') ? 'active' : '' }}" href="/dashboard/kunjungans">
            <span data-feather="briefcase" class="align-text-bottom"></span>
            Permintaan Kunjungan
          </a>
        </li>
        {{-- coba --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/agendas/approved*') ? 'active' : '' }}" href="{{ route('dashboard.agendas.approved') }}">
            <span data-feather="check-circle"></span>
            Riwayat Agenda
          </a>          
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/narasumbers/approved*') ? 'active' : '' }}" href="{{ route('dashboard.narasumbers.approved') }}">
            <span data-feather="check-circle"></span>
            Riwayat Narasumber
          </a>          
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kunjungans/approved*') ? 'active' : '' }}" href="{{ route('dashboard.kunjungans.approved') }}">
            <span data-feather="check-circle"></span>
            Riwayat Kunjungan
          </a>          
        </li>
      </ul>

      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <span data-feather="user-plus" class="align-text-bottom"></span>
            Registrasi User Baru
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/divisions*') ? 'active' : '' }}" href="/dashboard/divisions">
            <span data-feather="users" class="align-text-bottom"></span>
            Tambah Divisi
          </a>
        </li>
      </ul>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="grid" class="align-text-bottom"></span>
            Tambah Kategori
          </a>
        </li>
      </ul>
      @endcan

    </div>
  </nav>