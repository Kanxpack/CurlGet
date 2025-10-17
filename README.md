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