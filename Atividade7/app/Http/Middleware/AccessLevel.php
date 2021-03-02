<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessLevel{

    public function handle($request, Closure $next) {

        $nivel = Auth::user()->level;

        $rota = $request->route()->getName();

        if ($nivel == 0) {
            return redirect('negado');

        } elseif ($nivel == 1) {
            if ($rota != "curso.index" && $rota != "disciplina.index") {
                return redirect('negado');
            }
        }

    return $next($request);
    }
}