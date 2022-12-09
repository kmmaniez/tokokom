<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
      <div class="container mt-5">
        @auth
          <h4>{{ Auth::user()->email }} | <a href="/user" class="btn btn-md btn-primary">Lihat Profile</a></h4>
        @endauth
        <a href="/transaksi" class="btn btn-sm btn-primary">Transaksi</a>
        <a href="/products" class="btn btn-sm btn-primary">Products</a>
        <a href="/cart" class="btn btn-sm btn-primary">cart</a>
        @yield('konten')

        @auth
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn btn-md btn-primary mt-3">Logout</button>
          </form>
        @endauth
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
