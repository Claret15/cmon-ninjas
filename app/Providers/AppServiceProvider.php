<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Resources\Json\Resource;
use App\Console\Commands\ModelMakeCommand;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(urlGenerator $url)
    {

        // Switch between secure_asset and asset
        if(env('APP_ENV') !== 'local')
        {
            $url->forceScheme('https');
        }

        // Fix issue with migrations where there is a string length error
        Schema::defaultStringLength(191);

        // Disable the wrapping of the outer-most resource
        Resource::withoutWrapping();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // All new models will be created under App\Models folder
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
