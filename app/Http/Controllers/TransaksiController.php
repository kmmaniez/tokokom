<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

    public function index()
    {
        $distincbytotalbyr = DB::table('transaksi')->distinct()
            ->select('id_produk')->get();
        $nama = DB::table('transaksi')->select('id_produk')->where('totalbayar','=',280)->get();
        // $n = [];
        // for ($i=0; $i < count($nama); $i++) { 
        //     array_push($n, [
        //         $nama[$i]
        //     ]);
        // }
        // echo $nama[2]->id_produk;
        // $distincbynama = DB::table('transaksi')->distinct()
        //     ->select('totalbayar')->get();
        // dump($nama,$distincbynama);
        $transaksibyuser = Transaksi::all()->where('id_user','=',Auth::user()->id);
        return view('transaksi', [
            'listransaksi' => $transaksibyuser
        ]);
    }

    public function create()
    {
        dd(\Cart::getContent(),\Cart::getTotal());
    }

    public function store(Request $request)
    {
        $listkeranjang  = \Cart::getContent();
        $totalitem      = \Cart::getTotalQuantity();
        $totalbayar     = \Cart::getTotal();
        // dump($listkeranjang);
        $produk = [];
        foreach ($listkeranjang as $item) {
            array_push($produk, [
                'id_produk'     => $item['id'],
                'nama_produk'   => $item['name'],
                'quantity'      => $item['quantity']
            ]);
        }
        // dump($produk);
        // for ($i=0; $i < count($produk); $i++) { 
        //     echo $produk[$i]['nama_produk']. ' '.$produk[$i]['quantity']. '<br>';
        // }
        // die;
        for ($i=0; $i < count($produk); $i++) { 
            Transaksi::create([
                'no_order'      => 'TRXID-'.date('Ymd'),
                'id_user'       => Auth::user()->id,
                'id_produk'     => $produk[$i]['id_produk'],
                'totalitem'     => $produk[$i]['quantity'],
                'totalbayar'    => $totalbayar,
                'tgl_transaksi' => date('Y-m-d')
            ]);
        }
        \Cart::clear();
        return back()->with('success','Berhasil melakukan transaksi!');
    }

    public function show(Transaksi $transaksi)
    {
        dd($transaksi);
    }

    public function edit(Transaksi $transaksi)
    {
        //
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
