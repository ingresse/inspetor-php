# Inspetor PHP SDK

[![CircleCI](https://circleci.com/gh/ingresse/inspetor-php.svg?style=svg)](https://circleci.com/gh/ingresse/inspetor-php)
[![Maintainability](https://api.codeclimate.com/v1/badges/857a977a90b0d8b44123/maintainability)](https://codeclimate.com/github/ingresse/inspetor-php/maintainability)
[![codecov](https://codecov.io/gh/ingresse/inspetor-api/branch/master/graph/badge.svg?token=eWQ1gz4ZGZ)](https://codecov.io/gh/ingresse/inspetor-api)

This is a use handler to [Inspetor API](https://inspetor.github.io/docs-backend).

## Usage

First you have to create the client with your API token:

```php
$client = new Inspetor\Client;
$client->setToken('{{your-token}}');
```

Then just initialize the Inspetor class:

```php
$inspetor = new Inspetor\Inspetor($client);
```
