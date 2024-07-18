<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == "seller") {
                return $next($request);
            }
        }

        return redirect()->route('dashboard')->with('error', 'Unauthorized access');
    }
}
