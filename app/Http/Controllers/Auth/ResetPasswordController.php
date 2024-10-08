<?php

namespace App\Http\Controllers\Auth;

use App\Facades\FlashService;
use App\Facades\MetaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class ResetPasswordController extends Controller
{
    public function show(Request $request): Response
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'token' => ['required', 'string'],
        ]);

        MetaService::setTitle(title: 'Reset your Password');

        return Inertia::render('auth/ResetPassword', $validated);
    }

    public function store(PasswordResetRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->safe()->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                Auth::login($user);
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            FlashService::success('Your password has been successfully changed.', 'Password updated');

            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    }
}
