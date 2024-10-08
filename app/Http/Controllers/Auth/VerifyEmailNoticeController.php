<?php

namespace App\Http\Controllers\Auth;

use App\Facades\MetaService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class VerifyEmailNoticeController extends Controller
{
    public function __invoke(Request $request): Response
    {
        MetaService::setTitle('Email verification required');

        return Inertia::render('auth/MustVerifyEmail');
    }
}
