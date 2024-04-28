<?php

namespace App\Providers;

use App\Models\User;
use Auth;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseSizeCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\OptimizedAppCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
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

        Health::checks([
            OptimizedAppCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            DatabaseCheck::new(),
            DatabaseSizeCheck::new(),
            DatabaseTableSizeCheck::new(),
            CacheCheck::new(),
        ]);
        
    }
}
