<?php

use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\email_verified;
use App\Http\Middleware\IfAuthAdmin;
use App\Http\Middleware\VerifiedAdminEmail;
use App\Http\Middleware\VisitWebsite;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin'          => AuthAdmin::class,
            'is_verify_email'   => VerifiedAdminEmail::class,
            'email_verified'    => email_verified::class,  
            'if_auth_admin'     => IfAuthAdmin::class,  
            'visit_website'     => VisitWebsite::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
