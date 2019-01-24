<?php

/** @var \Laravel\Lumen\Routing\Router $router */
$router->get(
    config('opendox.routing.docs.route'),
    [
        'as' => 'opendox.docs',
        'middleware' => config('opendox.routing.docs.middleware', []),
        'uses' => 'Http\Controllers\DocumentationController@index',
    ]
);

if (config('opendox.frontend.redoc.enabled', true)) {
    $router->get(
        config('opendox.routing.ui.route'),
        [
            'as' => 'opendox.ui',
            'middleware' => config('opendox.routing.ui.middleware', []),
            'uses' => 'Http\Controllers\UiController@index',
        ]
    );
}

if (config('opendox.frontend.swagger.enabled', true)) {
    $router->get(
        config('opendox.routing.console.route'),
        [
            'as' => 'opendox.console',
            'middleware' => config('opendox.routing.console.middleware', []),
            'uses' => 'Http\Controllers\ConsoleController@index',
        ]
    );
}
