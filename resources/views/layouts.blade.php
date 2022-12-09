<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 px-4 py-3">
            <a class="navbar-brand" href="#">Toko-Komputer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link {{ (request()->is('products')) ? 'active' : '' }}" aria-current="page" href="/products">Data Produk</a>
                </li>
                @auth
                <li class="nav-item">
                  <a class="nav-link {{ (request()->is('cart')) ? 'active' : '' }}" aria-current="page" href="/cart">Keranjang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ (request()->is('transaksi')) ? 'active' : '' }}" aria-current="page" href="/transaksi">Transaksi saya</a>
                </li>
                @endauth
              </ul>
            </div>
            @if (Auth::check())
            <a href="/profile" class="btn btn-md btn-primary mx-2">My Profile</a>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-md btn-default text-white">Logout</button>
            </form>
            @else
            <a class="btn btn-md btn-primary" href="/login">Login</a>
            <a class="btn btn-md btn-default text-white" href="/register">Register</a>
            @endif
        </nav>

        @yield('konten')

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
