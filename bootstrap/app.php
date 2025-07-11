<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Csp\AddCspHeaders;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register custom route middleware aliases here
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminOnly::class,
            '2fa.confirmed' => \App\Http\Middleware\EnsureTwoFactorConfirmed::class,

            $middleware->append(AddCspHeaders::class),

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
