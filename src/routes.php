<?php

/** @var \Laravel\Lumen\Routing\Router $router */
$router->get(
    config('laradox.routing.docs.route'),
    [
        'as' => 'laradox.docs',
        'middleware' => config('laradox.routing.docs.middleware', []),
        'uses' => 'Http\Controllers\DocumentationController@index',
    ]
);

$router->get(
    config('laradox.routing.ui.route'),
    [
        'as' => 'laradox.ui',
        'middleware' => config('laradox.routing.ui.middleware', []),
        'uses' => 'Http\Controllers\UiController@index',
    ]
);
