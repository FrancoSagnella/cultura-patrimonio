<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ],
        [
            'name.required' => 'El nombre es requerido',
            'password.required' => 'La contraseña es requerida',
        ]);

        // dd(Hash::check($request->input('password'), $usuario->password));

        if(!auth()->attempt($request->only('name', 'password'))){
            return back()->with('status', 'Datos Incorrectos');
        }

        dd(auth()->user());
        return redirect()->route('home');
    }

    public function asd()
    {
        $usuario = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');
    }
}
