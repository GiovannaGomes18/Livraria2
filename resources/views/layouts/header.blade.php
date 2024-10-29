<header id="header" class="site-header">
  <div class="top-bar"></div>
  <nav id="header-nav" class="navbar navbar-expand-lg py-3">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="images/From Our CEO (1).jpg" class="logo" style="width: 150px; height: auto;">
      </a>
      <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="navbar-icon">
          <use xlink:href="#navbar-icon"></use>
        </svg>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
        <div class="offcanvas-header px-4 pb-0">
          <a class="navbar-brand" href="index.html">
            <img src="images/main-logo.png" class="logo">
          </a>
          <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
        </div>
        <div class="offcanvas-body">
          <ul id="navbar" class="navbar-nav text-uppercase justify-content-start justify-content-lg-center align-items-start align-items-lg-center flex-grow-1">
            @if(auth()->check() && auth()->user()->is_admin) <!-- Verifica se o usuário está autenticado e é administrador -->
              <li class="nav-item dropdown">
                <a class="nav-link me-4 dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Gerenciar</a>
                <ul class="dropdown-menu animate slide border">
                  <li><a href="{{ route('categorias.index') }}" class="dropdown-item fw-light">Categorias</a></li>
                  <li><a href="{{ route('livros.index') }}" class="dropdown-item fw-light">Livros</a></li>
                </ul>
              </li>
            @endif
          </ul>
          <div class="user-items d-flex">
            <ul class="d-flex justify-content-end list-unstyled mb-0">
              <li class="search-item pe-3">
                <a href="#" class="search-button">
                  <svg class="search">
                    <use xlink:href="#search"></use>
                  </svg>
                </a>
              </li>
              <li class="pe-3">
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <svg class="user">
                    <use xlink:href="#user"></use>
                  </svg>
                </a>
              </li>
              <li class="cart-item pe-3">
                <a href="{{ route('cart.index') }}">
                  <svg class="cart">
                    <use xlink:href="#bag"></use>
                  </svg>
                  @if(Session::has('cart') && count(Session::get('cart')) > 0)
                      <span class="badge bg-danger rounded-pill cart-count">{{ count(Session::get('cart')) }}</span>
                  @endif
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
