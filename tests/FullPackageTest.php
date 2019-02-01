<?php

namespace Noitran\Opendox\Tests;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Illuminate\Support\Facades\Artisan;

/**
 * Class FullPackageTest
 */
class FullPackageTest extends TestCase
{
    protected function getStubDirectory(): string
    {
        return __DIR__ . '/stubs';
    }

    /**
     * @param mixed $fileName
     *
     * @return void
     */
    protected function copyStubFile($fileName): void
    {
        $source = $this->getStubDirectory() . '/' . $fileName;
        $dest = base_path($fileName);
        copy($source, $dest);
    }

    /**
     * @test
     */
    public function itShouldTransformYamlToJson(): void
    {
        $this->copyStubFile('api-docs.yml');

        Artisan::call('opendox:transform');

        $json = file_get_contents(
            public_path('api-docs/api-docs.json')
        );

        $this->assertArrayHasKey('openapi', json_decode($json, true));
    }

    /**
     * @test
     *
     * @throws \Exception
     */
    public function itShouldTestDocsRoute(): void
    {
        $this->copyStubFile('api-docs.json');

        $response = $this->app->handle(SymfonyRequest::create('/docs', 'GET'));

        $this->assertObjectHasAttribute('openapi', $response->getData());
    }

    /**
     * @test
     *
     * @throws \Exception
     */
    public function itShouldTestRedocRoute(): void
    {
        $this->copyStubFile('api-docs.json');

        $response = $this->app->handle(SymfonyRequest::create('/api/documentation', 'GET'));

        $this->assertContains('http://localhost/api-docs/api-docs.json', $response->getContent());
    }

    /**
     * @test
     *
     * @throws \Exception
     */
    public function itShouldTestSwaggerRoute(): void
    {
        $this->copyStubFile('api-docs.json');

        $response = $this->app->handle(SymfonyRequest::create('/api/console', 'GET'));

        $this->assertContains('<div id="swagger-ui"></div>', $response->getContent());
    }
}
