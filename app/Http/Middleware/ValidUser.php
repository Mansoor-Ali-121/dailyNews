<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user IS authenticated (logged in)
        if (Auth::check()) {
            // If they are logged in, allow them to proceed to the intended page.
            // This is the correct action if the user is authenticated and is accessing a protected route.
            return $next($request);
        }
        // Else (if the user is NOT authenticated/logged in)
        else {
            // Redirect them to the login form.
            // This is the correct action if the user is not authenticated and tries to access a protected route.
            return redirect()->route('login.form');
        }
    }
}