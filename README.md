Opendox - OpenAPI 3.0 (Swagger 3) package for Lumen and Laravel
====================

<p align="center">
<a href="https://scrutinizer-ci.com/g/noitran/opendox/code-structure"><img src="https://img.shields.io/scrutinizer/coverage/g/noitran/opendox.svg?style=flat-square" alt="Coverage Status"></img></a>
<a href="https://scrutinizer-ci.com/g/noitran/opendox"><img src="https://img.shields.io/scrutinizer/g/noitran/opendox.svg?style=flat-square" alt="Quality Score"></img></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="Software License"></img></a>
<a href="https://github.com/noitran/opendox/releases"><img src="https://img.shields.io/github/release/noitran/opendox.svg?style=flat-square" alt="Latest Version"></img></a>
<a href="https://packagist.org/packages/iocaste/opendox"><img src="https://img.shields.io/packagist/dt/iocaste/opendox.svg?style=flat-square" alt="Total Downloads"></img></a>
<a href="#"><img src="https://img.shields.io/badge/License-MIT-yellow.svg"></a>
</p>

## About

This package will add console command to lumen/laravel which will parse yml file, convert it into json and save to public path.
Redoc UI is connected and Swagger UI are connected and can be accessed to view generated documentation.
Also package adds route for raw json documentation output, so this package can be used in microservice architecture, where all your microservices expose list of available routes.

## Features

* Adds console command `php artisan opendox:transform` to transform OpenApi 3.0 specification yaml files to json, so it can be accessible for external services
* Adds `/api/documentation` route where you can access <a href="https://github.com/Rebilly/ReDoc">Redoc UI</a> interface of documentation
* Adds `/api/console` route where you can access <a href="https://github.com/swagger-api/swagger-ui">Swagger UI</a> interface for API docs and interaction
* Adds `/docs` route where RAW json can be accessed

## Install

* Install as composer package

```bash
$ composer require noitran/opendox
```

* Open your bootstrap/app.php and register as service provider

```php
$app->register(Noitran\Opendox\ServiceProvider::class);
```

* Laravel: publish config file

```bash
$ artisan vendor:publish --provider="Noitran\Opendox\ServiceProvider"
```

## Usage

* In your application project `/src` folder create `api-docs.yml` file. Write your documentation using <a href="https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.0.md">OpenAPI</a> standard

### Example

```
openapi: "3.0.0"
info:
  version: 1.0.0
  title: Swagger Petstore
  license:
    name: MIT
servers:
  - url: http://petstore.swagger.io/v1
paths:
  /pets:
    get:
      summary: List all pets
      operationId: listPets
      tags:
        - pets
      parameters:
        - name: limit
          in: query
          description: How many items to return at one time (max 100)
          required: false
          schema:
            type: integer
            format: int32
      responses:
        '200':
          description: A paged array of pets
          headers:
            x-next:
              description: A link to the next page of responses
              schema:
                type: string
          content:
            application/json:
              schema:
                $ref: "#/components/schemas/Pets"
        default:
          description: unexpected error
          content:
            application/json:
              schema:
                $ref: "#/components/schemas/Error"
components:
  schemas:
    Pet:
      required:
        - id
        - name
      properties:
        id:
          type: integer
          format: int64
        name:
          type: string
        tag:
          type: string
    Pets:
      type: array
      items:
        $ref: "#/components/schemas/Pet"
    Error:
      required:
        - code
        - message
      properties:
        code:
          type: integer
          format: int32
        message:
          type: string
```

* Transform and publish your configuration file using command

```bash
$ php artisan opendox:transform
```

* Now your documentation is accessible via specified routes:

```
/api/documentation - Redoc UI interface

/api/console - Swagger UI with ability to test API

/docs - Raw JSON documentation output, that can be used for external services
```
