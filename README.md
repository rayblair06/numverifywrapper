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
Publish the config file `php artisan vendor:publish` then either replace the environment variable within the config or place your api key within your .env as "NUMVERIFY_API_KEY=<Numverify Api Key>"

### Laravel

###### Setting variables and verify

You can set the object variables for number and country code with the below methods then run the verify() method to verify the set values.

```php
Numverify::setNumber("1234567890");
Numverify::setCountryCode("GB");
Numverify::verify();
```

Alternatively you can stack them altogether.

```php
Numverify::setNumber("1234567890")->setCountryCode("GB")->verify();
```

###### Shorthand method

You can also just pass the phone number and the country code through the `verify()` method

```php
Numverify::verify("+441234567890");
// OR
Numverify::verify("1234567890", "GB");
```

Or use the `numverify()` helper function.

```php
numverify("1234567890");
// OR
numverify("1234567890", "GB");
```

###### Just return validation result

```php
// Returns either turn or false depending on api result

Numverify::isValid();
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
