<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilizador;
use Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function getRegistar() {
        return view('registar');
    }

    public function login() {
        $credenciais = request()->validate([
            'email'=> 'required',
            'password'=> ['required', 'alpha-num']
        ]);
        
        if (Auth::attempt($credenciais)) {
            $id = (Auth::id());

            if (Utilizador::isAdmin($id)) {
                return redirect('home/admin');
            }
            
            else if (Utilizador::isDocente($id)) {
                return redirect('home/docente');
            }
            
            else if (Utilizador::isAluno($id)) {
                return redirect('home/aluno');
            }
        }
        
        else {
            return redirect()->back()->withErrors("Email ou Palavra-Passe errada");
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
