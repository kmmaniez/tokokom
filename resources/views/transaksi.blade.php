@extends('layouts')

@section('konten')
<div class="row g-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nomor Order</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Total Item</th>
                <th scope="col">Total Belanja</th>
                <th scope="col">Tanggal Belanja</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listransaksi as $item)
            <tr>
                <td>{{ $item->no_order }}</td>
                <td>{{ $item->transproduct->nama_produk }} p</td>
                <td>{{ $item->totalitem }}</td>
                <td>{{ $item->totalbayar }}</td>
                <td>{{ $item->tgl_transaksi }}</td>
            </tr>
                
            @empty
                <tr>
                    <td colspan="4" class="text-center py-3"><i>Belum ada transaksi!, pilih barang <a href="/products">disini</a></i></td>
                </tr>
            @endforelse
        </tbody>        
    </table>
</div>
@endsection