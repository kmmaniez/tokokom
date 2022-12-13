@extends('admin.layouts')

@section('konten')
<h3>Edit Data Products</h3>
<form action="/product/edit-product/{{ $data->id }}" method="post">
  @method('put')
  @csrf
    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" value="{{ old('nama_produk', $data->nama_produk) }}" id="nama_produk">
      </div>
      <div class="mb-3">
        <label for="harga_produk" class="form-label">Harga Produk</label>
        <input type="number" class="form-control" min="0" name="harga_produk" value="{{ old('harga_produk', $data->harga) }}" id="harga_produk">
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
        <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi', $data->deskripsi) }}" id="deskripsi">
      </div>
      <div class="mb-3">
        <label for="gambar" class="form-label d-block">Gambar</label>
        <img src="{{ $data->image }}" class="img-thumbnail" style="width: 250px; height:150px; object-fit:cover;" alt="..."/>
        <input type="text" class="form-control" name="gambar" value="{{ old('gambar', $data->image) }}" id="gambar" placeholder="https://link.to/gambar">
      </div>
      <button type="submit" class="btn btn-md btn-primary">Update Data</button>
      <a href="/list-user" class="btn btn-md btn-default">Kembali</a>
</form>

@endsection