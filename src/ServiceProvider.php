<?php

namespace Noitran\Opendox;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Noitran\Opendox\Console\TransformDocsCommand;

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
        return __DIR__ . '/../config/opendox.php';
    }

    /**
     * Add the Cors middleware to the router.
     *
     * @return void
     */
    public function boot(): void
    {
        $viewPath = __DIR__ . '/../resources/views';
        $this->loadViewsFrom($viewPath, 'opendox');

        $configPath = __DIR__ . '/../config/opendox.php';
        if (function_exists('config_path')) {
            $publishPath = config_path('opendox.php');
        } else {
            $publishPath = base_path('config/opendox.php');
        }
        $this->publishes([$configPath => $publishPath], 'config');

        $this->app->router->group(['namespace' => 'Noitran\Opendox'], function ($router): void {
            require __DIR__ . '/routes/routes.php';
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $configPath = __DIR__ . '/../config/opendox.php';
        $this->mergeConfigFrom($configPath, 'opendox');

        $this->app->singleton('command.opendox.transform-docs', function () {
            return new TransformDocsCommand();
        });

        $this->commands(
            'command.opendox.transform-docs'
        );
    }
}
