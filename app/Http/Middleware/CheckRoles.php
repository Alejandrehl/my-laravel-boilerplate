<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // func_get_args Toma todos los parametros
        // array_slice Quita los dos primeros parametros.
        $roles = array_slice(func_get_args(), 2);

        if (Auth::user()->hasRoles($roles)) {
            return $next($request);
        }

        return redirect('/home');
    }
}
