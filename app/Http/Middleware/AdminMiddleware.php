<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // login route allow
        if ($request->routeIs('login')){
            return $next($request);
        }

        //user login check

        if(!Auth::check()){
            return redirect()->route('login');
        }
        $userRole = Auth::user()->role;

        //user role dashboard

        if(!in_array($userRole, $roles)){
            // abort(403, 'Unauthorizde');
            return match($userRole){
                'admin' => redirect()->route('admin.dashboard'),
                'manager' => redirect()->route('manager.dashboard'),
                default => redirect()->route('dashboard'),
            };
        }
        return $next($request);
    }
}
