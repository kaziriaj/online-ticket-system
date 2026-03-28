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
        //user login check with role
        if ($request->routeIs('login')){
            return $next($request);
        }
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if(!in_array(Auth::user()->role, $roles)){
            abort(403, 'Unauthorizde');
        }
        return $next($request);
    }
}
