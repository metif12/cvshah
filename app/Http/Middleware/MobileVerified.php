<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MobileVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if(!$user || !$user->mobile_verified_at) {
            if($request->expectsJson()) return abort(403);

            return redirect('verify');
        }

        return $next($request);
    }
}
