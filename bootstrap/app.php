<?php

use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $e) {
            $current = request()->getPathInfo();
            $current = explode('/', $current);
            $current = end($current);
            $found = Post::where('slug', 'like', '%'.$current)->first();
            // dd($found);

            if (! $found) {
                return redirect('/', 301);
            }

            return redirect($found->permalink, 301);
        });
    })->create();
