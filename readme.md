This is a Laravel 5 package that provides store management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `guru/store`.

    "guru/store": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Guru\Store\Providers\StoreServiceProvider::class,

```

And also add it to alias

```php
'Store'  => Guru\Store\Facades\Store::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Guru\Store\Providers\StoreServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Guru\Store\Providers\StoreServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Guru\Store\Providers\StoreServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Guru\Store\Providers\StoreServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Guru\Store\Providers\StoreServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Guru\Store\Providers\StoreServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


