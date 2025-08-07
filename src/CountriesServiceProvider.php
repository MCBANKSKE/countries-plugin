<?php

namespace Mcbankske\Countries;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class CountriesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load package migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Auto-run seeder after migrations ONLY when in console and during install
        if ($this->app->runningInConsole()) {
            // Publish seeders if user wants them externally
            $this->publishes([
                __DIR__ . '/../database/seeders' => database_path('seeders'),
            ], 'countries-seeders');

            // Run seeder only if database is migrated successfully
            $this->commands([]);
            
            // Call db:seed with specific seeder class if needed
            Artisan::call('db:seed', [
                '--class' => \Mcbankske\Countries\Database\Seeders\DatabaseSeeder::class,
                '--force' => true,
            ]);
        }
    }

    public function register(): void
    {
        // Register bindings or merge config here if needed in future
    }
}
