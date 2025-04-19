<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="logo" style="height: 60%">
        <h1 class="sitename">katabuku</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Beranda</a></li>
          <li><a href="/books">Buku</a></li>
          <li><a href="/genres">Genre</a></li>
        
          @guest
          <li><a href="/auth/register">Daftar</a></li>
          <li><a href="/auth/login">Masuk</a></li>
          @endguest
          @auth
          <li><a href="/profile">{{Auth()->user()->name}}</a></li>
          <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endauth
       
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>