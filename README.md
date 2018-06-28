# AlteredCarbon

![Travis](https://img.shields.io/travis/Mossengine/AlteredCarbon.svg)
![Codecov](https://img.shields.io/codecov/c/github/Mossengine/AlteredCarbon.svg)

![License](https://poser.pugx.org/mossengine/alteredcarbon/license)
![composer.lock](https://poser.pugx.org/mossengine/alteredcarbon/composerlock)

![Total Downloads](https://img.shields.io/packagist/dt/Mossengine/AlteredCarbon.svg)
![Monthly Downloads](https://img.shields.io/packagist/dm/Mossengine/AlteredCarbon.svg)
![Daily Downloads](https://img.shields.io/packagist/dd/Mossengine/AlteredCarbon.svg)

This Library extends the Carbon\Carbon class to include extra support for other DateTime formats and in particular the AltSO8601 datetime format.


## Functions
### __constructor()
```php
<?php
$stringAltSO8601 = '20180215135543:Australia/Brisbane';

$alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringAltSO8601);

$alteredCarbon->toDateTimeString();
// -> 2018-02-15 13:55:43

$alteredCarbon->getTimezone()->getName();
// -> Australia/Brisbane
```

### createFromAltSO8601()
```php
<?php
$stringAltSO8601 = '20180215135543:Australia/Brisbane';

$alteredCarbon = Mossengine\AlteredCarbon\AlteredCarbon::createFromAltSO8601($stringAltSO8601);

$alteredCarbon->toDateTimeString();
// -> 2018-02-15 13:55:43

$alteredCarbon->getTimezone()->getName();
// -> Australia/Brisbane
```

### toAltSO8601String()
```php
<?php
$stringDateTime = '2018-02-15 13:55:43';
$stringTimeZone = 'Australia/Brisbane';

$alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringDateTime, $stringTimeZone);

$alteredCarbon->toAltSO8601String();
// -> 20180215135543:Australia/Brisbane 
```

## Installation

### With Composer

```
$ composer require mossengine/alteredcarbon
```

```json
{
    "require": {
        "mossengine/alteredcarbon": "~1.0.0"
    }
}
```

```php
<?php
require 'vendor/autoload.php';

use Mossengine\AlteredCarbon\AlteredCarbon;

printf("AltSO8601 Now: %s", AlteredCarbon::now()->toAltSO8601String());
```


### Without Composer

Why are you not using [composer](http://getcomposer.org/)? Download [AlteredCarbon.php](https://github.com/Mossengine/AlteredCarbon/blob/master/src/AlteredCarbon.php) from the repo and save the file into your project path somewhere.

```php
<?php
require 'path/to/AlteredCarbon.php';

use Mossengine\AlteredCarbon\AlteredCarbon;

printf("AltSO8601 Now: %s", AlteredCarbon::now()->toAltSO8601String());
```
