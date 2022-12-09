@extends('layouts')

@section('konten')
<div class="">

    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if (session()->has('login-error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('login-error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="card ">
            <h2 class="text-center mt-3">Login</h2>
            <div class="card-body">
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" name="submitlogin" class="btn btn-primary w-100">Login</button>
                </form>
                <small class="d-block mt-3 text-center">Don't have an account ? <a href="/register">Register</a></small>
            </div>
        </div>
    </div>
</div>
@endsection