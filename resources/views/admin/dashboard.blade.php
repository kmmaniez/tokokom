@extends('template')

@section('konten')
<div class="container">
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
</div>
@endsection