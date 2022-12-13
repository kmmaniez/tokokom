@extends('admin.layouts')

@section('konten')
    <h3>List Transaksi Pengunjung</h3>
    <a href="/transaksi/create-transaksi" class="btn btn-md btn-primary">Tambah Transaksi</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nomor Order</th>
                <th scope="col">User</th>
                <th scope="col">Product</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Total Item</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $transaksi->no_order }}</td>
                <td>{{ $transaksi->tranuser->nama }}</td>
                <td>{{ $transaksi->transproduct->nama_produk  }}</td>
                <td>{{ $transaksi->tgl_transaksi }}</td>
                <td>{{ $transaksi->totalitem }}</td>
                <td>{{ $transaksi->totalbayar }}</td>
                <td>
                    <form action="/transaksi/delete-transaksi/{{ $transaksi->id }}" method="post">
                        @method('delete')
                        @csrf
                        <a href="/transaksi/edit-transaksi/{{ $transaksi->id }}" class="btn btn-sm btn-primary">EDIT</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection