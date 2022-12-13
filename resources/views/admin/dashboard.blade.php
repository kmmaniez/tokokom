@extends('admin.layouts')

@section('konten')
    <h3>Selamat datang {{ Auth::user()->nama }}!</h3>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                Total User <strong>{{ $totaluser }} Orang</strong>
                </div>
              </div>
        </div><div class="col">
            <div class="card">
                <div class="card-body">
                Total Products <strong>{{ $totalproduct }} Barang</strong>
                </div>
              </div>
        </div><div class="col">
            <div class="card">
                <div class="card-body">
                Total Transaksi <strong>{{ $totaltrans }} x</strong>
                </div>
              </div>
        </div>
    </div>
    
@endsection