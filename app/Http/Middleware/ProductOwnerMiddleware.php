<?php

namespace App\Http\Middleware;

// JUANCAMILO
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProductOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((Auth::user() && Auth::user()->getRole() == 'admin') || (Auth::user()->getId() == $request->user_id)) {
            return $next($request);
        } else {
            return redirect()->route('product.index');
        }

        return $next($request);
    }
}
