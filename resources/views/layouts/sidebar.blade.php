<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/6afb813a01.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="/dependencies/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css?v=1.21">
    <title>@yield('title')</title>
    
    <!-- Web Application Manifest -->
    <link rel="manifest" href="/manifest.json">
    <!-- Chrome for Android theme color -->
    <meta name="theme-color" content="#000000">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PWA">
    <link rel="icon" sizes="512x512" href="/images/icons/icon-512x512.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <link rel="apple-touch-icon" href="/images/icons/icon-512x512.png">

    <link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

    <!-- Tile for Win8 -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">
    @laravelPWA
  </head>
  <body>
    <nav class="navbar navbar-light navbar-expand-xl bg-light px-3">
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
                            <a class="nav-link px-3 active" aria-current="page" href="/">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="#">TENTANG KAMI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="#">CARA KERJA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="#">KONTAK</a>
                        </li>
                        <li class="nav-item btn-success nav-button">
                            <a class="nav-link px-3" style="color:white" href="/menabung">MULAI MENABUNG</a>
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
                                    <a class="dropdown-item" href="/pesananku">Dashboard</a>
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
                            <li class="nav-item">
                                <a class="nav-link px-4" href="/pesananku">Dashboard</a>
                            </li>
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
                        <a class="nav-link px-3 {{ request()->is('ubah-profil') ? 'active' : '' }}" aria-current="page" href="/ubah-profil"><i class="fas fa-user"></i><span class="px-3">Ubah Profil</span></a>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <p class="sidebar-subtitle">Bank Sampah</p>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('pesananku') ? 'active' : '' }}" aria-current="page" href="/pesananku"><i class="fas fa-hands"></i><span class="px-3">Pesananku</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('data-bank') ? 'active' : '' }}" aria-current="page" href="/data-bank"><i class="fas fa-piggy-bank"></i><span class="px-3">Data Bank Sampah</span></a>
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
                @yield('content')
            </div>    
        </div>
    </div>
    
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
                        <a class="nav-link px-3 {{ request()->is('ubah-profil') ? 'active' : '' }}" aria-current="page" href="/ubah-profil"><i class="fas fa-user"></i><span class="px-3">Ubah Profil</span></a>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav justify-content-center flex-grow-1">
                    <p class="sidebar-subtitle">Bank Sampah</p>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('pesananku') ? 'active' : '' }}" aria-current="page" href="/pesananku"><i class="fas fa-hands"></i><span class="px-3">Pesananku</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->is('data-bank') ? 'active' : '' }}" aria-current="page" href="/data-bank"><i class="fas fa-piggy-bank"></i><span class="px-3">Data Bank Sampah</span></a>
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
  </body>
</html>
