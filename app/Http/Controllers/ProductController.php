<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function productList()
    {
        $products = Product::all();
        // dd($products);
        return view('products', compact('products'));
    }
}
