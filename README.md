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


### Instantiation

```php
echo CurlGet::get('https://restcountries.com/v3.1/name/portugal')->getResult();
// This is a a Curl Get request that fetches the API JSON string from https://restcountries.com/v3.1/name/portugal

$postcodeArray = CurlGet::get('https://api.postcodes.io/postcodes/SW1A2AA')->getResultArray();
print_r($postcodeArray);
// This is Curl Get request that fetches the API JSON string and then converts it to an array from https://api.postcodes.io/postcodes/SW1A2AA
```

### Reference

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

This is the main static method that handles the CUrl Get request and it returns an instance of itself.

## Credits

This project exists thanks to all the people who contribute.

[Kanxpack](https://github.com/Kanxpack)

## Sponsors

Support this project by becoming a sponsor. Your logo will show up here with a link to your website.

## 






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