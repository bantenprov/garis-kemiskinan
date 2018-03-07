<?php

namespace Bantenprov\GarisKemiskinan;

use Illuminate\Support\ServiceProvider;
use Bantenprov\GarisKemiskinan\Console\Commands\GarisKemiskinanCommand;

/**
 * The GarisKemiskinanServiceProvider class
 *
 * @package Bantenprov\GarisKemiskinan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class GarisKemiskinanServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
        $this->seedHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('garis-kemiskinan', function ($app) {
            return new GarisKemiskinan;
        });

        $this->app->singleton('command.garis-kemiskinan', function ($app) {
            return new GarisKemiskinanCommand;
        });

        $this->commands('command.garis-kemiskinan');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'garis-kemiskinan',
            'command.garis-kemiskinan',
        ];
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('garis-kemiskinan.php');

        $this->mergeConfigFrom($packageConfigPath, 'garis-kemiskinan');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'garis-kemiskinan-config');
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'garis-kemiskinan');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/garis-kemiskinan'),
        ], 'garis-kemiskinan-lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'garis-kemiskinan');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/garis-kemiskinan'),
        ], 'garis-kemiskinan-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'garis-kemiskinan-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'garis-kemiskinan-migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'garis-kemiskinan-public');
    }

    public function seedHandle()
    {
        $packageSeedPath = __DIR__.'/database/seeds';

        $this->publishes([
            $packageSeedPath => base_path('database/seeds')
        ], 'garis-kemiskinan-seeds');
    }
}
