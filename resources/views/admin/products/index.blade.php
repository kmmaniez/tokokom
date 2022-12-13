@extends('admin.layouts')

@section('konten')
    <h3>List Product</h3>
    <a href="/product/create-product" class="btn btn-md btn-primary">Tambah Products</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ $product->image }}" style="width: 100px; height:100px; object-fit:cover;"/></td>
                <td>{{ $product->nama_produk }}</td>
                <td>{{ $product->harga }}</td>
                <td>{{ $product->deskripsi }}</td>
                <td>
                    <form action="/product/delete-product/{{ $product->id }}" method="post">
                        @method('delete')
                        @csrf
                        <a href="/product/edit-product/{{ $product->id }}" class="btn btn-sm btn-primary">EDIT</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection