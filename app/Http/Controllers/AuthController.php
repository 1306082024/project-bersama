<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboardA'); 
            } 
            
            if ($user->role === 'teknisi') {
                return redirect()->intended('/teknisi');
            }

            return redirect('/');
        }

        return back()->with('error', 'email atau password salah.');
    }

public function logout(Request $request)
{
    auth()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/loginP')->with('success', 'Anda telah berhasil keluar.');
}
}