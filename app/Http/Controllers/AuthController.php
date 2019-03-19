<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Utilizador;

class AuthController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function getRegistar() {
        return view('registar');
    }

    public function login() {
        $credenciais = ['email' => request('email'), 'password' => request('password')];
        
        if (Auth::attempt($credenciais)) {
            return redirect('home');
        }
        else {
            return redirect()->back();
        }
    }

    public function registar() {
        Utilizador::create([
            'nome' => request('nome'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
