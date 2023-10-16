<style>
  .navbar-brand {
    background-color: #f8f9fa;
  }

  .navbar-nav .dropdown-toggle {
    color: #000;
  }
  
  .navbar-nav .dropdown-toggle img {
    width: 30px;
    height: 30px;
  }
  
  .navbar-nav .dropdown-toggle .text-dark {
    font-size: 14px;
    font-weight: bold;
  }
  
  .dropdown-menu {
    position: absolute;
    right: 0;
    z-index: 1;
    border: 1px solid #ddd;
    border-radius: 0;
    box-shadow: none;
  }
  
  .dropdown-menu a {
    color: #000;
    font-size: 14px;
    font-weight: bold;
    padding: 10px 20px;
  }
  
  .dropdown-menu a:hover {
    background-color: #f5f5f5;
  }

  .dropdown-menu li:nth-last-child(1) {
    border-top: 1px solid #ccc;
  }

  </style>
  
  <header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a href="/dashboard" class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-dark">
      <!-- Logo -->
      <img src="https://bali.bnn.go.id/konten/unggahan/2020/11/bali-header-dark-480x50-1.png" alt="Logo BNNP Bali" width="300px">
    </a>
  
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <ul class="navbar-nav px-3">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{-- <img class="rounded-circle me-2" width="25" src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="Avatar"> --}}
          <span class="text-dark">Selamat datang, {{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="position: absolute; top: 50px; right: 0;">
          <li><a class="dropdown-item" href="/dashboard/profile"><span data-feather="user" class="align-text-bottom" ></span> Profile</a></li>
          {{-- <li><a class="dropdown-item" href="#"><span data-feather="lock" class="align-text-bottom" ></span> Ubah Password</a></li> --}}
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item" style="color: #000; font-size: 14px; font-weight: bold; padding: 10px 20px;"><span data-feather="power" class="align-text-bottom"></span> Logout</button>
            </form>
          </li>
        </ul>
      </div>

      
    </ul>
  </header>
  
  
  