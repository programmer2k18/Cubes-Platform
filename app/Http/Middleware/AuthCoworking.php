<?php

namespace App\Http\Middleware;

use Closure;

class AuthCoworking
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
        if ($request->session()->has('admin')
            &&$request->session()->exists('admin')){
            return $next($request);
        }else
            return redirect('/dashboard/login')->with('msg','You must login to perform this operation ');
    }
}
