<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register',[
            'title_page' => 'Register Page'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namalengkap'   => 'required|max:255',
            'username'      => 'required|max:15',
            'telepon'       => 'required',
            'email'         => 'required|email|unique:users',
            'alamat'        => 'required',
            'password'      => 'required|min:5|max:255'
        ]);
        $validatedData['password']      = Hash::make($validatedData['password']);

        User::create([
            'nama'      => $request->input('namalengkap'),
            'username'  => $request->input('username'),
            'is_admin'  => false,
            'telepon'   => $request->input('telepon'),
            'email'     => $request->input('email'),
            'alamat'    => $request->input('alamat'),
            'password'  => $validatedData['password']
        ]);
        
        return redirect('/login')->with('success','register success. login!');
    }
}
