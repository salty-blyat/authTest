<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
 
        if (!Auth::check()) {
            return redirect()->route('home');  
        }

        if ($request->is('dashboard') && Auth::user()->role !== 'admin') {
            return redirect()->route('shop');  
        }

        return $next($request);
    }
}
