@extends('layouts')

@section('konten')
<div class="d-flex justify-content-center">
    <div class="card" style="width: 500px;">
        <div class="card-body">
            <h3 class="ml-5 mb-4">Data Pribadi</h3>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="namalengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="namalengkap" id="namalengkap" value="{{ Auth::user()->nama }}" disabled>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->username }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="telepon">Telepon</label>
                        <input type="text" min="0" class="form-control" name="telepon" id="telepon" value="{{ Auth::user()->telepon }}" disabled> 
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" disabled>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ Auth::user()->alamat }}" disabled>
            </div>
            <a href="/products" class="btn btn-md btn-default">< Kembali</a>
        </div>
    </div>
</div>
@endsection