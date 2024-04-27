<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Vite;

use Illuminate\Validation\Rules\Password;
use JeffGreco13\FilamentBreezy\Facades\FilamentBreezy;


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
        Filament::serving(function () {
            Filament::registerTheme(
                app(Vite::class)('resources/css/filament.css')
            );
        });

        \JeffGreco13\FilamentBreezy\FilamentBreezy::setPasswordRules(
            [
                Password::min(8)->letters()
                    ->numbers()->mixedCase()
                    ->uncompromised(3) ,
            ]
    );
    }
}
