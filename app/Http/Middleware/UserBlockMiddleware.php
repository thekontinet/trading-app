<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserBlockMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && $request->user()->blocked){
            auth()->logout();
            return redirect()->route('login')->withErrors([
                'email' => 'This email has been blocked. Please contact support for more information'
            ]);
        }
        return $next($request);
    }
}
