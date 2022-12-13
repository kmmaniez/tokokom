@extends('admin.layouts')

@section('konten')
<h3>Tambah Data Users</h3>
<form action="/users/create-user" method="post">
  @csrf
    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" min="0" name="username" id="username">
      </div>
      <div class="mb-3">
        <label for="telepon" class="form-label">Telepon</label>
        <input type="number" class="form-control" min="0" name="telepon" id="telepon">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" min="0" name="email" id="email">
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" min="0" name="alamat" id="alamat">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" min="0" name="password" id="password">
      </div>
      <button type="submit" class="btn btn-md btn-primary">Simpan Data</button>
      <button type="reset" class="btn btn-md btn-default">Reset Data</button>
</form>

@endsection