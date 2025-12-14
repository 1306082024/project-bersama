<?php

namespace App\Http\Middleware;

use Closure;
use app\Models\User;

use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (auth()->user()->role !== $role) {
        abort(403);
    }

    return $next($request);
    }
}
