<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirect to the home page or any other page
            switch (Auth::user()->role) {
                case 'User':
                    return redirect('/home')->with('error', 'You do not have permission to access this page.');
                case 'Admin':
                    return redirect('/dashboard')->with('error', 'You do not have permission to access this page.');
                default:
                    return redirect('/login')->with('error', 'You do not have permission to access this page.');
            }
            // return redirect('/')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
        
        // return response()->json(['You do not have permission to access for this page.']);

        // switch (auth()->user()->type) {
        //     case 'User':
        //         return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        //     case 'Admin':
        //         return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        //     default:
        //         return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
        // }
    }
}
