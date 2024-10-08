<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Facades\FlashService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    public function show(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        FlashService::success(
            "Your email address has been successfully verified.",
            'Email Verified'
        );

        return to_route('dashboard');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        FlashService::success(
            "We've sent you a new email verification link. Please follow the instructions there to verify.",
            'Verification Link Sent'
        );

        return back();
    }
}
