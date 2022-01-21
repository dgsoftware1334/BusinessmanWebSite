<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       if(Auth::check() && Auth::user()->status){
        $block=Auth::user()->status == "1";
        Auth::logout();
        if($block == 1){
            $message="votre compte a été banni, veuillez contacter l'administrateur";
        }
        return redirect()->route('user.login')
        ->withErrors(['email'=>'votre compte a été banni, veuillez contacter l administrateur
']);
       }

        return $next($request);
    }
}
