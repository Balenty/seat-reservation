<?php

namespace App\Providers;

use App\Providers\Socialize\SocialiteIdentityProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

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
        $socialite = $this->app->make(Factory::class);
        $socialite->extend('identity', function () use ($socialite) {
            $config = config('services.identity');

            return $socialite->buildProvider(SocialiteIdentityProvider::class, $config);
        });
    }
}
