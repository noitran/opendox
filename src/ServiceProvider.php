<?php

namespace Iocaste\Laradox;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Iocaste\Laradox\Console\TransformDocsCommand;

/**
 * Class ServiceProvider
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * @return string
     */
    protected function getConfigPath(): string
    {
        return __DIR__ . '/../config/laradox.php';
    }

    /**
     * @return bool
     */
    protected function isLumen(): bool
    {
        return str_contains($this->app->version(), 'Lumen');
    }

    /**
     * Add the Cors middleware to the router.
     *
     * @return void
     */
    public function boot()
    {
        $viewPath = __DIR__.'/../resources/views';
        $this->loadViewsFrom($viewPath, 'laradox');

        $this->app->router->group(['namespace' => 'Iocaste\Laradox'], function ($router) {
            require __DIR__.'/routes.php';
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__.'/../config/laradox.php';
        $this->mergeConfigFrom($configPath, 'laradox');

        $this->app->singleton('command.laradox.transform-docs', function () {
            return new TransformDocsCommand();
        });

        $this->commands(
            'command.laradox.transform-docs'
        );
    }
}
