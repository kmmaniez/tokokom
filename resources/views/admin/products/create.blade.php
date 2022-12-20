@extends('template')

@section('konten')

<div class="container">
  <h3>Tambah Data Products</h3>
<form action="/product/create-product" method="post">
  @csrf
    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" id="nama_produk">
      </div>
      <div class="mb-3">
        <label for="harga_produk" class="form-label">Harga Produk</label>
        <input type="number" class="form-control" min="0" name="harga_produk" id="harga_produk">
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
        <input type="text" class="form-control" name="deskripsi" id="deskripsi">
      </div>
      <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="text" class="form-control" name="gambar" id="gambar" placeholder="https://link.to/gambar">
      </div>
      <button type="submit" class="btn btn-md btn-primary">Simpan Data</button>
      <button type="reset" class="btn btn-md btn-default">Reset Data</button>
</form>
</div>

@endsection