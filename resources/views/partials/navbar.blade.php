
    {{-- Navbar --}}
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid" >
        {{-- Logo --}}
        <a class="navbar-brand col-md-4" href="/">
            <img src="https://bali.bnn.go.id/konten/unggahan/2020/11/bali-header-dark-480x50-1.png" alt="Logo BNNP Bali" width="300px">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    {{-- Nav item --}}
      <div class="collapse navbar-collapse col-md-4 ps-5 ms-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "beranda") ? 'active' : '' }}" href="/">Beranda</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link {{ ($active === "profil") ? 'active' : '' }}" href="/profil">Profil</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Kategori</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($active === "narasumber") || ($active === "kunjungan") ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Layanan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/narasumber">Permintaan Narasumber</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/kunjungan">Permintaan Kunjungan</a></li>
            </ul>
          </li>
          {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </form> --}}
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Selamat datang, {{ auth()->user()->name }}
                </a>
                @can('admin')
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
                
                @elsecan('staff')
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>

                @else('eksternal')
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/userprofile"><i class="bi bi-person-circle"></i> Profil</a></li>
                  <li><a class="dropdown-item" href="/narasumber"><i class="bi bi-person-plus"></i> Permintaan Narasumber</a></li>
                  <li><a class="dropdown-item" href="/kunjungan"><i class="bi bi-card-checklist"></i> Permintaan Kunjungan</a></li>
                  <li><a class="dropdown-item" href="/narasumber/status"><i class="bi bi-card-list"></i> Status Narasumber</a></li>
                  <li><a class="dropdown-item" href="/kunjungan/status"><i class="bi bi-card-list"></i> Status Kunjungan</a></li>

                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
                @endcan

              </li>
            @else
            <li class="nav-item">
            {{-- Login --}}
              <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login </a>
            </li>
            @endauth
          </ul>
        
      </div>
    </div>
  </nav>