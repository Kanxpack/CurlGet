# CurlGet

Simple PHP cUrl Get API

## Usage

```php
<?php
use Kanxpack\CurlGet\CurlGet;

require_once './vendor/autoload.php';

echo CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResult();

print_r(CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResultArray());

$curlArray = CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResultArray();

print_r($curlArray[0]['name']['common']);
```

## Installation

### With Composer

```
composer require kanxpack/curlget
```

```
{
    "require": {
        "kanxpack/curlget": "^1.0"
    }
}
```

```php
<?php
require 'vendor/autoload.php';

use Kanxpack\CurlGet\CurlGet;

echo CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResult();

print_r(CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResultArray());

```

### Without Composer

Why are you not using [composer](https://getcomposer.org/)? Download the [CurlGet latest release](https://github.com/Kanxpack/CurlGet/releases) and put the contents of the ZIP archive into a directory in your project. Then require the file autoload.php to get all classes and dependencies loaded on need.

```php
<?php
require 'path-to-Carbon-directory/autoload.php';

use Kanxpack\CurlGet\CurlGet;

echo CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResult();

print_r(CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResultArray());
```

## Documentation

The CurlGet class handles the cURL Get request in PHP.

```php
<?php
namespace Kanxpack\CurlGet;

class CurlGet {

    // code here

}
```
You can see from the code snippet above that the CurlGet class is declared in the Kanxpack\CurlGet namespace. You need to import the namespace to use Carbon without having to provide its fully qualified name each time.

```php
use Carbon\Carbon;
```

Examples in this documentation will assume you imported classes of the Kanxpack\CurlGet namespace this way.



```php
public static function get(string $url, array $get = array(), array $options = array()) : self
{
    self::setDefaults($url, $get);
    self::initialiseHandle();
    self::setOptionsArray($options);
    self::executeSession();
    return self::getInstance();
}
```