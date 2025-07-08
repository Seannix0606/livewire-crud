<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Log the login attempt for debugging
        Log::info('Login attempt for email: ' . $credentials['email']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Log::info('Login successful for email: ' . $credentials['email']);
            
            return redirect()->intended(route('products.index'))
                ->with('success', 'Login successful!');
        }

        Log::warning('Login failed for email: ' . $credentials['email']);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records. Please check your email and password.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}
