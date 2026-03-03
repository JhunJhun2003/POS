<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('Login.login');
        // return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        \Illuminate\Support\Facades\Log::info('User logged in', [
            'id' => auth()->id(),
            'usertype' => auth()->user()->usertype
        ]);

        if (auth()->user()->usertype === 'admin') {
            \Illuminate\Support\Facades\Log::info('Redirecting to admin index');
            return redirect()->route('admin.index');
        }

        \Illuminate\Support\Facades\Log::info('Redirecting to user index');
        return redirect()->route('user.index');
    }   

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
