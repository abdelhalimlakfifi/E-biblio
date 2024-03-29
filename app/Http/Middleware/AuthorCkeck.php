<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorCkeck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if((!session()->has('LoggedAuthor')) && (($request->path() != 'auth/login') && ($request->path() != 'auth/register'))){
            
            return redirect('/auth/login');
        }

        if(session()->has('LoggedAuthor') && ($request->path() == '/auth/login' || $request->path() == '/auth/register')){
            return back();
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan');;
    }
}
