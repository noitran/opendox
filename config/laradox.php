<?php

return [

    'documentation_source' => [

        /**
         * Do conversion from yml to json.
         */
        'convert' => true,

        /*
         * Documentation file type. Supported types are compatible with OpenApi 3 specification:
         * yml, json
         */
        'extension' => 'yml',

        /*
         * Directory path where documentation is located.
         */
        'path' => base_path('/'),

        /*
         * Filename, without extension.
         */
        'filename' => 'api-docs',

        /*
         * Where to save converted documentation
         */
        'save_to' => base_path('public/api-docs'),
    ],

    'views' => [

        /*
         * Absolute path to views directory
         */
        'path' => base_path('resources/views/vendor/laradox'),
    ],

    'routing' => [

        /*
         * JSON documentation output
         */
        'docs' => [

            /*
             * Route for accessing converted json file
             */
            'route' => '/docs',

            'middleware' => [
                //
            ],
        ],

        /*
         * UI Interface
         */
        'ui' => [

            /*
             * Route for accessing Redoc UI API interface
             */
            'route' => '/api/documentation',

            'middleware' => [
                //
            ],
        ],

        'console' => [

            /*
             * Route for accessing Swagger UI API interface
             */
            'route' => '/api/console',

            'middleware' => [
                //
            ],
        ],
    ],
];