<?php

namespace Noitran\Opendox\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Noitran\Opendox\ServiceProvider;

/**
 * Class TestCase
 */
abstract class TestCase extends OrchestraTestCase
{
    /**
     * @param \Laravel\Lumen\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
        ];
    }
}
