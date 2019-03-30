<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admistrador;
use App\Docente;
use App\Aluno;
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

            //redereciona para as paginas home correspondentes
            if (Admistrador::where('utilizador_id', $id)->count() > 0) {
                return redirect('home/admin');
            }
            
            else if (Docente::where('utilizador_id', $id)->count() > 0) {
                $numero = Docente::where('utilizador_id', $id)->first()->numero;
                request()->session()->put('userNum', $numero);

                return redirect('home/docente');
            }
            
            else if (Aluno::where('utilizador_id', $id)->count() > 0) {
                $numero = Aluno::where('utilizador_id', $id)->first()->numero;
                request()->session()->put('userNum', $numero);

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
