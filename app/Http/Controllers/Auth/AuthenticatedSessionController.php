<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Check user's role and redirect accordingly
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin');
            } elseif (Auth::user()->role === 'fournisseur') {
                return redirect()->intended('/fournisseur');
            } elseif (Auth::user()->role === 'comptable') {
                return redirect()->intended('/comptable');
            } elseif (Auth::user()->role === 'superadmin') {
                return redirect()->intended('/superadmin');
            }

            return redirect()->intended('/home');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
