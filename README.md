# Inspetor PHP SDK

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
