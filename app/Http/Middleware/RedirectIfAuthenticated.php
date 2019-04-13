<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Utilizador;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $utilizador = Utilizador::find(Auth::id());

            if ($utilizador->admistrador) {
                return redirect('/home/admin');
            }

            else if ($utilizador->aluno) {
                return redirect('/home/aluno');
            }

            else if ($utilizador->docente) {
                return redirect('/home/docente');   
            }
        }

        return $next($request);
    }
}
