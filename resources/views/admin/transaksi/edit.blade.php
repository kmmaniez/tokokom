@extends('template')

@section('konten')
<div class="container">
  <h3>Tambah Data Transaksi</h3>
<form action="/transaksi/edit-transaksi/{{ $transaksi->id }}" method="post">
  @csrf
  @method('put')
    <div class="mb-3">
        <label for="no_order" class="form-label">Nomor Order</label>
        <input type="text" class="form-control" name="no_order" id="no_order" value="{{ old('no_order', $transaksi->no_order) }}" readonly>
      </div>
      <div class="mb-3">
        <label for="id_user" class="form-label">User</label>
        <select name="id_user" id="id_user" class="form-control">
          @foreach ($users as $user)
          @if ($transaksi->id_user == $user->id)
          <option value="{{ $user->id }}" selected>{{ $user->nama }}</option>
          @else
          <option value="{{ $user->id }}">{{ $user->nama }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="id_produk" class="form-label">Produk</label>
        <select name="id_produk" id="id_produk" class="form-control">
          @foreach ($products as $product)
          @if ($transaksi->id_produk == $product->id)
          <option value="{{ $product->id }}" selected>{{ $product->nama_produk }}</option>
          @else
          <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
          @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="totalitem" class="form-label">Total Item</label>
        <input type="number" min="0" class="form-control" name="totalitem" id="totalitem" value="{{ old('totalitem', $transaksi->totalitem) }}">
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