<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/dependencies/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">

    <title>Ubah Password | E-NGOPAHCIBESUT</title>
  </head>
  <body class="area">
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
        <div class="form-box px-5">
          <h1 class="page-header" style="text-align:center">Ubah Password</h1>
          <form method="POST" action="">
            @csrf
            <div class="row justify-content-center">
              <div class="col-md-12 pt-5">
                <input type="password" class="form-control py-3 @error('current_password') is-invalid @enderror" style="margin:auto" placeholder="Password Saat Ini" name="current_password" required>
                @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-12 pt-3">
                <input type="password" class="form-control py-3 @error('new_password') is-invalid @enderror" style="margin:auto" placeholder="Password Baru" name="new_password" required>
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-12 pt-3">
                <input type="password" class="form-control py-3 @error('new_confirm_password') is-invalid @enderror" style="margin:auto" placeholder="Konfirmasi Password Baru" name="new_confirm_password" required>
                @error('new_confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-12 pt-5 text-center">
                <button class="form=control btn btn-success w-100 py-3" type="submit" style="text-align:center; margin:auto">Ubah Password</button>
              </div>
            </div>
          </form>
          <div class="row py-3">
            <p class="text-center"><a href="/register" style="text-decoration:none;color:green">Kembali</a></p>
          </div>
        </div>
      </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="/dependencies/bootstrap-5.1.3/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>