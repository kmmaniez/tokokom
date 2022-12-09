@extends('layouts')

@section('konten')

<div class="d-flex justify-content-center">
  <div class="row d-flex">
      @foreach ($products as $product)
      <div class="col-md-3">
          <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card" style="width: 250px;height:100%;">
                <img src="{{ url($product->image) }}" style="width:100%;height:200px; object-fit: cover" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->nama_produk }} <span class="badge rounded-pill px-2 py-2 text-bg-success">${{ $product->harga }}</span>
                  </h5>
                  <input type="hidden" value="{{ $product->id }}" name="id">
                  <input type="hidden" value="{{ $product->nama_produk }}" name="name">
                  <input type="hidden" value="{{ $product->harga }}" name="price">
                  <input type="hidden" value="{{ $product->image }}"  name="image">
                  <input type="hidden" value="1" name="quantity">
                  @if (Auth::check())
                    <button class="btn btn-success btn-md w-100">Add To Cart</button>
                    @else
                    <button class="btn btn-success btn-md w-100" disabled>Login untuk beli</button>
                  @endif
                </div>
              </div>
          </form>
      </div>
      @endforeach
  </div>

</div>
@endsection