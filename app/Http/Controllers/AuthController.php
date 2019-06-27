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

    public function getLoginIngles() {
        return view('loginIngles');
    }

    public function getRegistar() {
        return view('registar');
    }

    public function login() {
        $rememberMe = request('rememberMe') == 'rememberMe';

        $credenciais = request()->validate([
            'email'=> 'required',
            'password'=> ['required', 'alpha-num']
        ]);
        
        if (Auth::attempt($credenciais, $rememberMe)) {
            $id = (Auth::id());
            
            //redereciona para as paginas home correspondentes
            if (Utilizador::find($id)->admistrador) {
                return redirect('home/admin');
            }
            
            else if (Utilizador::find($id)->docente) {
                $numero = Utilizador::find($id)->docente->numero;
                request()->session()->put('userNum', $numero);

                return redirect('home/docente');
            }
            
            else if (Utilizador::find($id)->aluno) {
                $numero = Utilizador::find($id)->aluno->numero;
                request()->session()->put('userNum', $numero);

                return redirect('home/aluno');
            }
        }
        
        else {
            return redirect()->back()->withErrors("Email ou Palavra-Passe errada");
        }
    }

    public function registar() {
        request()->validate([
            'nome' => ['required'],
            'email' => ['required','email'],
            'password' => ['required']
        ]); 

        Utilizador::create([
            'nome' => request('nome'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
    }

    public function logout() {
        Auth::logout();
        request()->session()->forget('userNum');

        return redirect('/');
    }
}
