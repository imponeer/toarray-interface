[![License](https://img.shields.io/github/license/imponeer/toarray-interface.svg?maxAge=2592000)](LICENSE)
[![GitHub release](https://img.shields.io/github/release/imponeer/toarray-interface.svg?maxAge=2592000)](https://github.com/imponeer/toarray-interface/releases) [![Maintainability](https://api.codeclimate.com/v1/badges/79f89e2fe21c0076c29a/maintainability)](https://codeclimate.com/github/imponeer/toarray-interface/maintainability) [![PHP](https://img.shields.io/packagist/php-v/imponeer/toarray-interface.svg)](http://php.net) 
[![Packagist](https://img.shields.io/packagist/dm/imponeer/toarray-interface.svg)](https://packagist.org/packages/imponeer/toarray-interface)

# ToArray Interface

Some long time ago there were [RFC about adding __toArray method into PHP](https://wiki.php.net/rfc/object_cast_to_types). Sadly, this was rejected. [PHP-FIG](https://www.php-fig.org/psr/) doesn't have yet any project about that. And that's why today we have many classes in different frameworks that has toArray method. There are some composer packages that has toArray interface like [illuminate/contracts](https://packagist.org/packages/illuminate/contracts). However these packages are not very good choice if you need only one file with interface from there. In that case they have many things that you do not need. So, that's why we have created small composer library that could be used for such cases.

So, basically this library is only for one thing - it gives interface that could be used when you need to know if object has possibility to be converted to array with `toArray` method.

## Installation

To install and use this package, we recommend to use [Composer](https://getcomposer.org):

```bash
composer require imponeer/toarray-interface
```

Otherwise you need to include manualy files from `src/` directory. 

**Note:** if you need to use this library in PHP 5 project, you need use [1.0 version of this library](https://packagist.org/packages/imponeer/toarray-interface#1.0.0).

## Example

```php

use Imponeer/ToArrayInterface;

class DummyObject implements ToArrayInterface {

   /**
    * Converts object to array
    *
    * @return array
    */
   public function toArray(): array {
      return array(
      	'hash' => sha1(time())
      );
   }

}

$instance = new DummyObject();
if ($instance instanceof ToArrayInterface) {
	var_dump($instance->toArray());
}

```

## How to contribute?

If you want to add some functionality or fix bugs, you can fork, change and create pull request. If you not sure how this works, try [interactive GitHub tutorial](https://skills.github.com).

If you found any bug or have some questions, use [issues tab](https://github.com/imponeer/toarray-interface/issues) and write there your questions.
