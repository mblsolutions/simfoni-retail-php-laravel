# Simfoni Retail interface for Laravel

The Simfoni Retail Interface for Laravel gives you an API interface into the Simfoni Retail Platform
for your Laravel applications.

## Access Tokens

## Integration Applications

Simfoni Retail provides an interface for the integrator to manage their own set of security credentials. This interface is
available from the ‘Integrations’ menu item of Simfoni Retail.

- [Live Integration Applications](https://simfoni.io/app/integrations) / [Staging Integration Applications](https://staging.simfoni.io/app/integrations)
- [Live Documentation](https://simfoni.io/app/docs/api/intro) / [Staging Documentation](https://staging.simfoni.io/app/docs/api/intro)

## Installation

The recommended way to install Simfoni Retail Laravel is through [Composer](https://getcomposer.org/).

```bash
composer require mblsolutions/simfoni-retail-php-laravel
```

## Laravel without auto-discovery

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
\MBLSolutions\SimfoniRetailLaravel\SimfoniRetailServiceProvider::class,
```

## Usage

Copy the package config to your local config with the publish command:

```bash
php artisan vendor:publish --provider="MBLSolutions\SimfoniRetailLaravel\SimfoniRetailServiceProvider"
```

A new config file will be available in `config/simfoniretail.php`, please familiarise yourself with the available
environment variables that should be setup in `.env`.

```dotenv
SIMFONI_RETAIL_ENDPOINT=https://simfoni.io
SIMFONI_API_TOKEN=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmOGMwNDAxZDAy
```````````

### Authentication

The Simfoni Retail Service provider will automatically inject your authentication token and endpoint into the SimfoniRetail
base class. To override these settings you can set up the configuration manually.

```php
SimfoniRetail::setBaseUri('https://simfoni.io');
SimfoniRetail::setToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmOGMwNDAxZDAy');
```

Please Note: We do recommend using the Service Provider supplied in this package.

### Further documentation

See the Simfoni Retail Interface for PHP [package](https://github.com/mblsolutions/simfoni-retail-php) for further documentation on issuing transactions.

### License

Simfoni Retail Interface for Laravel is free software distributed under the terms of the MIT license.

A contract/subscription to Simfoni Retail is required to make use of this package, for more information contact 
[Redu Group](mailto:tech@redu.co.uk)