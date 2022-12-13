@extends('layouts')

@section('konten')
@if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" style="width: 450px;" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<div class="row g-12">
    <h3 class="mt-4">Keranjang belanja | Total: ${{ Cart::getTotal() }}</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Img</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cartItems as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{ $item->attributes->image }}" alt="" style="width: 150px;height:100px;" srcset=""></td>
                <td>{{ $item->name }}</td>
                <td>
                    {{-- update --}}
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id}}" >
                        <input type="text" name="quantity" value="{{ $item->quantity }}" class="form-control mb-2" style="width: 50px" />
                            <button class="btn btn-primary btn-sm">Update</button>
                            </form>
                </td>
                <td>${{ $item->price }}</td>
                <td>
                    {{-- delete --}}
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="id">
                        <button class="btn btn-danger btn-sm">remove</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center"><i>Keranjang kosong, pilih produk <a href="/products">disini</i></a></td>
                </tr>
            @endforelse
        </tbody>        
    </table>
    <div class="d-flex">
        <div class="item me-3">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                @if (Cart::getTotal() > 0)
                <button class="btn btn-danger btn-sm">Hapus semua keranjang</button>
                @else
                  <button class="btn btn-danger btn-sm" disabled>Hapus semua keranjang</button>
                @endif
            </form>
        </div>
        <div class="item">
            <form action="/transaksi" method="POST">
                @csrf
                @if (Cart::getTotal() > 0)
                <button class="btn btn-sm btn-success">+ Tambah Transaksi</button>
                @else
                <button class="btn btn-sm btn-success" disabled>+ Tambah Transaksi</button>
                @endif
            </form>

        </div>
    </div>
    
</div>
@endsection