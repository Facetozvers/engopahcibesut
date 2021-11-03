<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/6afb813a01.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="/dependencies/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <link rel="stylesheet" href="/assets/css/main.css?v=1.22">
    <title>@yield('title')</title>

    
    @laravelPWA

  </head>
  <body>
    <div class="preloader">
        <div class="loading">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        </div>
    </div>
    <nav class="navbar sticky-top navbar-light navbar-expand-xl bg-light px-3">
        <div class="container-fluid py-3">
            <a class="navbar-brand" href="/"><h2 class="m-0">E-NGOPAHCIBESUT</h2></a>
            <button style="border:none" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span><i class="fas fa-bars" style="color:black;font-size:1.5em" ></i></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link px-3" aria-current="page" href="/">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/#tentang_kami">TENTANG KAMI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/#cara_kerja">CARA KERJA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/#kontak">KONTAK</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="d-none d-xl-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link px-3" aria-current="page" href="/login">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3" href="/register">DAFTAR</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="/workspace/pending">Workspace</a>
                                    @else
                                    <a class="dropdown-item" href="/pesananku">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>
                    </div>

                    <!-- mobile navbar -->
                    <div class="d-flex d-xl-none">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link px-3" aria-current="page" href="/login">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3" href="/register">DAFTAR</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link px-3" style="color:black" aria-current="page">{{ Auth::user()->name }}</a>
                            </li>
                            @if(Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link px-4" href="/workspace/pending">Workspace</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link px-4" href="/pesananku">Dashboard</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link px-4" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            
                        @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-4">
        <div class="row">
            <div class="d-none d-xl-block col-md-3 sidebar bg-light position-relative"  style="border-radius:4px;height:720px">
                <h4 class="sidebar-header" style="color:black">{{Auth::user()->name}}</h4>
                <p class="sidebar-subtitle" style="color:black; margin-top:0; padding-top:0">{{Auth::user()->phone_number}}</p>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link px-3" aria-current="page" href="/ganti-password"><i class="fas fa-key"></i><span class="px-3">Ubah Password</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/ubah-profil') ? 'active' : '' }}" aria-current="page" href="/workspace/ubah-profil"><i class="fas fa-user"></i><span class="px-3">Ubah Profil</span></a>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <p class="sidebar-subtitle">Bank Sampah</p>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/pending') ? 'active' : '' }}" aria-current="page" href="/workspace/pending"><i class="fas fa-clock"></i><span class="px-3">Pending Request</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/history') ? 'active' : '' }}" aria-current="page" href="/workspace/history"><i class="fas fa-history"></i><span class="px-3">History Request</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/data-bank') ? 'active' : '' }}" aria-current="page" href="/workspace/data-bank"><i class="fas fa-piggy-bank"></i><span class="px-3">Data Bank Sampah</span></a>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link px-1 pb-3 position-absolute" style="bottom:0" aria-current="page" href="/"></i><span class="page-header">E-NGOPAHCIBESUT</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 col-12 col-xl-9">
            <a class="btn btn-success button-menu d-block d-xl-none mb-3" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <div class="row">  
                    <div class="col-8">
                        <p class="text-start mb-0">Dashboard Menu</p>
                    </div>
                    <div class="col-4">
                        <p class="text-end mb-0"><i class="fas fa-bars"></i></p>
                    </div>

                </div>
            </a>
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @yield('content')
            </div>    
        </div>
    </div>
    
    <!-- mobile navbar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body sidebar">
        <h4 class="sidebar-header" style="color:black">{{Auth::user()->name}}</h4>
                <p class="sidebar-subtitle" style="color:black; margin-top:0; padding-top:0">{{Auth::user()->phone_number}}</p>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link px-3" aria-current="page" href="/ganti-password"><i class="fas fa-key"></i><span class="px-3">Ubah Password</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/ubah-profil') ? 'active' : '' }}" aria-current="page" href="/workspace/ubah-profil"><i class="fas fa-user"></i><span class="px-3">Ubah Profil</span></a>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <p class="sidebar-subtitle">Bank Sampah</p>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/pending') ? 'active' : '' }}" aria-current="page" href="/workspace/pending"><i class="fas fa-clock"></i><span class="px-3">Pending Request</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/history') ? 'active' : '' }}" aria-current="page" href="/workspace/history"><i class="fas fa-history"></i><span class="px-3">History Request</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('workspace/data-bank') ? 'active' : '' }}" aria-current="page" href="/workspace/data-bank"><i class="fas fa-piggy-bank"></i><span class="px-3">Data Bank Sampah</span></a>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link px-1 pb-3 position-absolute" style="bottom:0" aria-current="page" href="/"></i><span class="page-header">E-NGOPAHCIBESUT</span></a>
                    </li>
                </ul>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/dependencies/bootstrap-5.1.3/js/bootstrap.bundle.min.js" ></script>
    <script>
        $(function () {
        // page is loaded, it is safe to hide loading animation
        $('.preloader').hide();

        $(window).on('beforeunload', function () {
            // user has triggered a navigation, show the loading animation
            $('.preloader').show();
        });
    });
    </script>
  </body>
</html>
