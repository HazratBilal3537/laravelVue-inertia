<?php

namespace App\Http\Controllers\Auth;

use App\Facades\FlashService;
use App\Facades\MetaService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;
use Inertia\Response;

class ForgotPasswordController extends Controller
{
    public function show(): Response
    {
        MetaService::setTitle(title: 'Request Password Reset Link');

        return Inertia::render('auth/ForgotPassword');
    }

    public function store(ForgotPasswordRequest $request): RedirectResponse
    {
        $email = $request->validated('email');

        $status = Password::sendResetLink($request->safe()->only('email'));

        FlashService::info('If valid, we\'ll send a link to reset your password to the email address provided.', 'Request received');

        return back();
    }
}
