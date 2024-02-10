<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $response = $next($request);
        $response->header('Accept', 'Application/json');

        return $response;

        // if(Auth::check()){
        //     return $next($request);
        // }
        // return redirect()->to('login')->withErrors('Login invalid, please login');

        // $request->headers->set('Accept', 'application/json');
        // $request->headers->set('Content-Type', 'application/json');

        // return $next($request);
    }
}
