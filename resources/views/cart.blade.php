@extends('layouts')

@section('konten')
@if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" style="width: 450px;" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<div class="row g-12">
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
            @foreach ($cartItems as $item)
            <tr>
                <th scope="row">1</th>
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
            @endforeach
        </tbody>        
    </table>
    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button class="btn btn-danger btn-sm">Clear Carts</button>
    </form>
    <form action="/transaksi" method="POST">
        @csrf
        @foreach ($cartItems as $item)
            <input type="hidden" name="id_item" value="{{ $cartItems }}">
            {{-- <input type="hidden" name="namaitem" value="{{ $item->name }}">
            <input type="hidden" name="quantity" value="{{ $item->quantity }}"> --}}
        @endforeach
        <button class="btn btn-sm btn-success">+ Transaksi</button>
    </form>
    <p>Total: ${{ Cart::getTotal() }}</p>
</div>
@endsection