<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCek
{

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('loginP')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        if ($user->role === 'admin') {
            return redirect('/admin/dashboardA')->with('error', 'Anda tidak diizinkan mengakses halaman Teknisi.');
        } 
        
        if ($user->role === 'teknisi') {
            return redirect('/teknisi')->with('error', 'Anda tidak diizinkan mengakses halaman Admin.');
        }

        auth()->logout();
        return redirect()->route('loginP');
    }
}