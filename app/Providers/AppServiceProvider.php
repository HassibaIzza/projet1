<?php

namespace App\Providers;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $locale = Session::get('locale', config('app.locale'));
        //dd($locale);  Cette ligne affichera la langue en cours et stoppera l'exécution
        App::setLocale($locale);
    }
}
