<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/redirect';

    /**
     * Define your route model bindings, pattern based filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
            // Appliquer la redirection dynamique après connexion
        Route::get('/redirect', function () {
            return redirect(RouteServiceProvider::home());
        })->middleware('auth');

        /* Vous enregistrerez vos middleware personnalisés ici
        Route::aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
        Route::aliasMiddleware('agent', \App\Http\Middleware\AgentMiddleware::class);*/
    }

    public static function home()
{
    $user = auth()->user();
    
    if ($user && $user->role === 'admin') {
        return '/admin/dashboard';
    } elseif ($user && $user->role === 'agent') {
        return '/agent/dashboard';
    }

    return '/'; // Par défaut
}
}