<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses admin.');
        }

        return $next($request);
    }
}
