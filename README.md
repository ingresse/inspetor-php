# Inspetor PHP SDK

[![CircleCI](https://circleci.com/gh/ingresse/inspetor-php.svg?style=svg)](https://circleci.com/gh/ingresse/inspetor-php)
[![Maintainability](https://api.codeclimate.com/v1/badges/857a977a90b0d8b44123/maintainability)](https://codeclimate.com/github/ingresse/inspetor-php/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/857a977a90b0d8b44123/test_coverage)](https://codeclimate.com/github/ingresse/inspetor-php/test_coverage)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This is a use handler to [Inspetor API](https://inspetor.github.io/docs-backend).

## Installation

Composer:

```sh
$ composer require ingresse/inspetor-php
```

## Usage

First you have to create the client with your API token:

```php
$client = new Inspetor\Client('{{your-token}}');
```

Then just initialize the Inspetor class:

```php
$inspetor = new Inspetor\Inspetor($client);
```

Responses are converted to Response objects, that helps you to get exactly what you need:

```php
$response = $inspetor->accountCreate($data);

echo $response->isSuccess(); // true
echo $response->getData(); // null
echo $response->getError(); // null
```

Here you can check all actions that can be used. Those are pretty much the actions described in Inspetor docs.

```php
// Account
$inspetor->accountCreate($data);
$inspetor->accountUpdate($data);
$inspetor->accountDelete($data);

// Auth
$inspetor->auth($data);
$inspetor->forgotPassword($data);

// Event
$inspetor->eventCreate($data);
$inspetor->eventUpdate($data);
$inspetor->eventDelete($data);

// Sale
$inspetor->saleCreate($data);
$inspetor->saleUpdate($data);
$inspetor->saleDelete($data);

// Transfer
$inspetor->transferCreate($data);
$inspetor->transferUpdate($data);
```

## Handling errors

Some errors that may occur are converted to exceptions. This helps developers to prevent errors in code-time:

```php
try {
    $inspetor->createAccount(['test'=>'2']);
} catch (Inspetor\UnauthorizedException $e) {
    var_dump("There is something wrong with your token");
} catch (Inspetor\ApiException $e) {
    var_dump("There may be something wrong with Inspetor");
}
```

Other errors are converted to Response pretty much like the success responses. This allows you to find out what really happend to you request:

```php
$response = $inspetor->accountCreate($data);

echo $response->isSuccess(); // false
echo $response->getData(); // null
echo $response->getError(); /*
    [
        "error_message" => [
            "id" => [
                "Missing data for required field."
            ],
            "email" => [
                "Missing data for required field."
            ]
        ],
        "error_code": 2
    ]
/*

```

MIT License

Copyright (c) 2019 Ingresse S.A.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
