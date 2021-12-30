<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class StaticAuth
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
        $token = config('auth.static_token') ?? Str::random(32);

        if($request->input('token') != $token) {
            if($request->expectsJson()) return abort(422);

            return redirect('login');
        }

        return $next($request);
    }
}
