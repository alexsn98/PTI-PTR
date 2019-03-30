<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\DB;

class Docente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $id = (Auth::id());

        if ((DB::table('docente')->where('utilizador_id', $id)->count() > 0)) {
            return $next($request);
        }

        return abort(403);
    }
}
