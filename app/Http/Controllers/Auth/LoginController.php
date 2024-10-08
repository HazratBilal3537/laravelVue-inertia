<?php

namespace App\Http\Controllers\Auth;

use App\Facades\MetaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function show()
    {
        MetaService::setTitle('Login');

        return Inertia::render('auth/Login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['email', 'password']);

        if (Auth::attempt($credentials, $request->validated('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Unable to login with these credentials',
        ])->onlyInput('email');
    }
}
