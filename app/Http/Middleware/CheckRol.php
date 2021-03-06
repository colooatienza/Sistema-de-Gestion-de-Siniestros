<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request;

class CheckRol {
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (Auth::guest()){
          return redirect()->intended('/');
        }
        elseif (Auth::user()->rol_id != 1) {
            return redirect()->intended('/');
        }

        return $next($request);
    }

}