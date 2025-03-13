<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckIfIsAdmin; // Importa o middleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // Registra como middleware de rota
        $middleware->alias([
            'admin' => CheckIfIsAdmin::class, // Agora 'admin' pode ser usado nas rotas
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
