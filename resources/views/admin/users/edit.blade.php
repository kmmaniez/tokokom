@extends('admin.layouts')

@section('konten')
<h3>Edit Data Users</h3>
<form action="/users/edit-user/{{ $data->id }}" method="post">
@method('PUT')
  @csrf
    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama', $data->nama) }}" id="nama_lengkap">
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" min="0" name="username" value="{{ old('username', $data->username) }}" id="username">
      </div>
      <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="number" class="form-control" min="0" name="telepon" value="{{ old('telepon', $data->telepon) }}" id="telepon">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" min="0" name="email" value="{{ old('email', $data->email) }}" id="email">
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" min="0" name="alamat" value="{{ old('alamat', $data->alamat) }}" id="alamat">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" min="0" name="password" id="password">
      </div>
      <button type="submit" class="btn btn-md btn-primary">Simpan Data</button>
      <a href="/list-user" class="btn btn-md btn-default">Kembali</a>
</form>

@endsection