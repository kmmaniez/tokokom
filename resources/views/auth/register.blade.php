@extends('layouts')

@section('konten')
<div class="d-flex justify-content-center">
    <div class="card" style="width: 500px;">
        <h2 class="text-center mt-3">Register Akun</h2>
        <div class="card-body">
            <form action="/register" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="namalengkap">Nama Lengkap</label>
                            <input type="text" class="form-control @error('namalengkap') is-invalid @enderror" name="namalengkap" id="namalengkap" value="{{ old('namalengkap') }}">
                            @error('namalengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="telepon">Telepon</label>
                            <input type="number" min="0" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="telepon" value="{{ old('telepon') }}">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                
               
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" name="btnregister" class="btn btn-primary w-100">Register</button>
            </form>
            <small class="d-block mt-3 text-center">already registered ? <a href="/login">Login</a></small>
        </div>
    </div>
</div>
@endsection