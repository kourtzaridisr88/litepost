<?php

namespace Litepost;

use Illuminate\Support\ServiceProvider;

class LitepostServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\SitemapCommand::class
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/theme.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'litepost');

        $this->publishes([
            __DIR__. '/database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
