<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/dependencies/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <link rel="stylesheet" href="/assets/css/main.css?v=1.23">

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

    <title>Register | E-NGOPAHCIBESUT</title>
  </head>
  <body class="area">
    <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
    </div>
    <!-- animated circle background -->
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
      <a class="navbar-brand" href="/" style="text-align:center"><h2 class="mt-5 mb-4">E-NGOPAHCIBESUT</h2></a>
      <div class="container px-4">
        <div class="form-box p-5">
          <h1 class="page-header" style="text-align:center">Register</h1>
          <p class="page-subtitle px-2" style="text-align:center">Untuk mulai menabung, silahkan mendaftar akun anda dengan mengisi form berikut</p>
          <form method="POST" action="{{ route('register') }}">
              @csrf
            <div class="row justify-content-center">
              <div class="col-md-12 pt-5">
                <input type="text" class="form-control py-3 @error('name') is-invalid @enderror" style="margin:auto" placeholder="Nama Lengkap" value="{{ old('name') }}" name="name" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-12 pt-3">
                <input type="number" class="form-control py-3 @error('phone_number') is-invalid @enderror" style="margin:auto" placeholder="Nomor Handphone" name="phone_number" required>
                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-12 pt-3">
                <input type="password" class="form-control py-3 @error('password') is-invalid @enderror" style="margin:auto" placeholder="Password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-12 pt-3">
                <input type="password" class="form-control py-3" style="margin:auto" placeholder="Konfirmasi Password" name="password_confirmation" required>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-12 pt-5 text-center">
                <button class="form=control btn btn-success py-3 w-100" style="text-align:center; margin:auto">Daftar</button>
              </div>
            </div>
          </form>
          <div class="row py-3">
            <p class="text-center">Sudah punya akun? <a href="/login" style="text-decoration:none;color:green">Login</a></p>
          </div>
        </div>
      </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="/dependencies/bootstrap-5.1.3/js/bootstrap.bundle.min.js" ></script>
  </body>
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
</html>