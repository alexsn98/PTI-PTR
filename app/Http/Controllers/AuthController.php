<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

            if (DB::table('admistrador')->where('id_utilizador', $id)->count() > 0) {
                return redirect('home/admin');
            }
            
            else if (DB::table('aluno')->where('id_utilizador', $id)->count() > 0) {
                return redirect('home/aluno');
            }

            else if (DB::table('docente')->where('id_utilizador', $id)->count() > 0) {
                return redirect('home/docente');
            }
            dd($id);
            //dd(DB::table('docente')->where('id_utilizador', 1)->count());
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
