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
        <div class="row">
            <div class="col-lg-3">
                <ul class="list-group">
                </ul>
                <div class="list-group">
                    <a href="/dashboard" class="list-group-item list-group-item-action list-group-item-dark">
                        Sidebar Menu Admin
                    </a>
                    <a href="{{ route('listuser') }}" class="list-group-item list-group-item-action active">Halaman User</a>
                    <a href="{{ route('listproduct') }}" class="list-group-item list-group-item-action">Halaman Product</a>
                    <a href="{{ route('listtrans') }}" class="list-group-item list-group-item-action">Halaman Transaksi</a>
                  </div>
                  <form action="" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-md btn-primary mt-3">Logout</button>
                  </form>
            </div>
            <div class="col-lg-9">
                
                @yield('konten')
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
