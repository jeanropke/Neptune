<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\UserGroup;
use App\Http\Middleware\VerifyCsrfToken;
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
        //
        $middleware->alias([
            'admin' => Admin::class,
            'user'  => UserGroup::class,
        ]);
        //$middleware->append(Admin::class);
        //$middleware->append(UserGroup::class);
        //$middleware->append(VerifyCsrfToken::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
