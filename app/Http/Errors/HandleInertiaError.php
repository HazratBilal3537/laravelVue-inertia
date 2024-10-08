<?php

namespace App\Http\Errors;

use Throwable;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Http\RedirectResponse;

class HandleInertiaError
{
    public function __invoke(Exceptions $exceptions)
    {
        $exceptions->respond(function (Response|RedirectResponse $response, Throwable $exception, Request $request) {
            if (!app()->environment(['local', 'testing']) && in_array($response->status(), [500, 503, 404, 403])) {
                return Inertia::render('Error', ['status' => $response->status()])
                    ->toResponse($request)
                    ->setStatusCode($response->status());
            } elseif ($response->status() === 419) {
                return back()->with([
                    'message' => 'The page expired, please try again.',
                ]);
            }

            return $response;
        });
    }
}
