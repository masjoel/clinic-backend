<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 
    })
    // ->withMiddleware(function (Middleware $middleware) {
    //     $middleware = [
    //         // \App\Http\Middleware\TrustHosts::class,
    //         \App\Http\Middleware\TrustProxies::class,
    //         \Illuminate\Http\Middleware\HandleCors::class,
    //         \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
    //         \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
    //         \App\Http\Middleware\TrimStrings::class,
    //         \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    //     ];
    //     $middlewareGroups = [
    //         'web' => [
    //             \App\Http\Middleware\EncryptCookies::class,
    //             \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    //             \Illuminate\Session\Middleware\StartSession::class,
    //             \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    //             \App\Http\Middleware\VerifyCsrfToken::class,
    //             \Illuminate\Routing\Middleware\SubstituteBindings::class,
    //         ],
    
    //         'api' => [
    //             // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    //             \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
    //             \Illuminate\Routing\Middleware\SubstituteBindings::class,
    //         ],
    //     ];
    // })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
