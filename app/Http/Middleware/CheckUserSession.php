<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user')) {
            return redirect()->route('login')->withErrors(['username' => 'Please log in to access this page.']);
        }
        return $next($request);
    }
}
