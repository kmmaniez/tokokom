<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // AMBIL DATA
    public function index()
    {
        $products   = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function listProducts()
    {
        $products   = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }
    
    public function listUsers()
    {
        $users   = User::all();
        return view('admin.users.index', ['users' => $users]);
    }
    
    public function listTransaksis()
    {
        $transaksi   = Transaksi::all();
        return view('admin.transaksi.index', ['transaksis' => $transaksi]);
    }

    // TAMBAH DATA
    public function createProduct() // DONE
    {
        return view('admin.products.create');
    }
    
    public function createUser() // DONE
    {
        return view('admin.users.create');
    }
    
    public function createTransaksi() // DONE
    {
        $products = Product::all();
        $users      = User::all();
        return view('admin.transaksi.create', compact('products','users'));
    }

    // SIMPAN DATA
    public function simpanProduct(Request $request) // DONE
    {
        // dd($request);
        Product::create([
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga_produk'),
            'deskripsi' => $request->input('deskripsi'),
            'image' => $request->input('gambar')
        ]);
        return redirect(route('listproduct'));
    }
    
    public function simpanUser(Request $request) // DONE
    {
        // dd($request);
        User::create([
            'nama' => $request->input('nama_lengkap'),
            'username'=> $request->input('username'),
            'is_admin'=> false,
            'telepon'=> $request->input('telepon'),
            'alamat'=> $request->input('alamat'),
            'email'=> $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        return redirect(route('listuser'));
    }
    
    public function simpanTransaksi(Request $request)
    {
        $product  = Product::where('id',$request->input('id_produk'))->get();
        $productharga = $product[0]['harga'];
        // dd($product, $productharga);
        Transaksi::create([
            'no_order'      =>  $request->input('no_order'),
            'id_user'       =>  $request->input('id_user'),
            'id_produk'     =>  $request->input('id_produk'),
            'totalitem'     =>  $request->input('totalitem'),
            'totalbayar'    =>  $productharga * $request->input('totalitem'),
            'tgl_transaksi' =>  $request->input('tgl_transaksi'),
        ]);
        return redirect(route('listtrans'));
    }

    // EDIT DATA
    public function editProduct(Product $product) // DONE
    {
        return view('admin.products.edit', ['data' => $product]);
        // dd($product);
    }
    
    public function editUser(User $user) // DONE
    {
        return view('admin.users.edit', ['data' => $user]);
        // dd($user);
    }
    
    public function editTransaksi(Transaksi $transaksi)
    {
        $products = Product::all();
        $users      = User::all();
        return view('admin.transaksi.edit', compact('transaksi', 'users', 'products'));
        // dd($transaksi);
    }

    // UPDATE DATA

    public function updateProduct(Request $request, Product $product) // DONE
    {
        // dd($request);
        Product::where('id', $product->id)->update([
            'nama_produk' => $request->input('nama_produk'),
            'harga' => $request->input('harga_produk'),
            'image' => $request->input('gambar'),
            'deskripsi' => $request->input('deskripsi'),
        ]);
        return redirect(route('listproduct'));
    }
    
    public function updateUser(Request $request, User $user) // DONE
    {
        $nama  = $request->input('nama_lengkap');
        $username = $request->input('username');
        $is_admin = false;
        $telepon = $request->input('telepon');
        $alamat = $request->input('alamat');
        $email = $request->input('email');
        $password  = $request->input('password');
        
        if (empty($password)) {
            echo 'koosng';
            User::where('id', $user->id)->update([
                'nama' => $nama ,
                'is_admin' => $is_admin,
                'username' => $username ,
                'telepon' => $telepon,
                'alamat' => $alamat,
                'email' => $email
            ]);
        }else{
            echo 'o';
            User::where('id', $user->id)->update([
                'nama' => $nama,
                'is_admin' => $is_admin,
                'username' => $username ,
                'telepon' => $telepon,
                'alamat' => $alamat,
                'email' => $email,
                'password' => Hash::make($password)
            ]);
        }
        return redirect(route('listuser'));
        // dd($request);
    }
    
    public function updateTransaksi(Request $request, Transaksi $transaksi)
    {
        $product  = Product::where('id',$request->input('id_produk'))->get();
        $productharga = $product[0]['harga'];
        Transaksi::where('id', $transaksi->id)->update([
            'no_order'      =>  $request->input('no_order'),
            'id_user'       =>  $request->input('id_user'),
            'id_produk'     =>  $request->input('id_produk'),
            'totalitem'     =>  $request->input('totalitem'),
            'totalbayar'    =>  $productharga * $request->input('totalitem'),
            'tgl_transaksi' =>  $request->input('tgl_transaksi'),
        ]);
        return redirect(route('listtrans'));
    }

    // DETELE DATA
    public function deleteProduct(Product $product) // DONE
    {
       Product::destroy($product->id);
       return redirect(route('listproduct'));
    }
    
    public function deleteUser(User $user) // DONE
    {
       User::destroy($user->id);
       return redirect(route('listuser'));
    }
    
    public function deleteTransaksi(Transaksi $transaksi) 
    {
       Transaksi::destroy($transaksi->id);
       return redirect(route('listtrans'));
    }
}
