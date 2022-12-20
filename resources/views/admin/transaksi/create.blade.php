@extends('template')

@section('konten')
<div class="container">
  <h3>Tambah Data Transaksi</h3>
<form action="/transaksi/create-transaksi" method="post">
  @csrf
    <div class="mb-3">
        <label for="no_order" class="form-label">Nomor Order</label>
        <input type="text" class="form-control" name="no_order" id="no_order" value="TRXID-{{ date('Ymd') }}" readonly>
      </div>
      <div class="mb-3">
        <label for="id_user" class="form-label">User</label>
        <select name="id_user" id="id_user" class="form-control">
          <option value="">-- Pilih User --</option>
          @foreach ($users as $user)
          <option value="{{ $user->id }}">{{ $user->nama }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="id_produk" class="form-label">Produk</label>
        <select name="id_produk" id="id_produk" class="form-control">
          <option value="">-- Pilih Produk --</option>
          @foreach ($products as $product)
          <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="totalitem" class="form-label">Total Item</label>
        <input type="number" min="0" class="form-control" name="totalitem" id="totalitem">
      </div>
      <div class="mb-3">
        <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
        <input type="text" class="form-control" value="{{ date('Y-m-d') }}" readonly name="tgl_transaksi" id="tgl_transaksi">
      </div>
      <button type="submit" class="btn btn-md btn-primary">Simpan Data</button>
      <button type="reset" class="btn btn-md btn-default">Reset Data</button>
</form>
</div>
@endsection