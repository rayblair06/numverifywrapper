# A PHP Wrapper for the Numverify API

## Installation

` composer require rayblair/numverifywrapper `

### Laravel Integration

Add the service provider to your `config/app.php` file:

```php

    'providers'     => [
        // ...
        Rayblair\NumverifyWrapper\NumverifyServiceProvider::class,

    ],
```

Add the facade to your `config/app.php` file:

```php

    'aliases'       => [
        // ...
        'Numverify' => Rayblair\NumverifyWrapper\Facades\Numverify::class,
    ],

```
#### Adding Api Key

If you haven't already go to http://numverify.com and register for an api key.
Publish the config file then either replace the environment variable with your api key or place within your .env as "NUMVERIFY_API_KEY=<Numverify Api Key>"

`php artisan vendor:publish`

#### Edit config file


### Laravel

###### Set Number to valid

```php
Numverify::setNumber("1234567890");
```

###### Set Country Code for validation

```php
Numverify::setCountryCode("GB");
```

###### Validate and return api results

```php
Numverify::verify();
```

###### Just return validation result

```php
// Returns either turn or false depending on api result

Numverify::isValid();
```

###### Set Number and Country Together

```php
Numverify::setNumber("1234567890")->setCountryCode("GB")->verify();
```


### Without Laravel

```php

require_once "vendor/autoload.php";

$data['api_key'] = "<Numverify Api Key>";

$numverify = new Rayblair\NumverifyWrapper\NumverifyService($data);

$numverify->setNumber("1234567890")->setCountryCode("GB")->verify();

```


## License

NumverifyWrapper is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2018 Ray Blair
