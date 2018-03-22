[![License](https://img.shields.io/github/license/imponeer/toarray-interface.svg?maxAge=2592000)](LICENSE)
[![GitHub release](https://img.shields.io/github/release/imponeer/toarray-interface.svg?maxAge=2592000)](https://github.com/imponeer/toarray-interface/releases) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/imponeer/toarray-interface/badges/quality-score.png)](https://scrutinizer-ci.com/g/imponeer/toarray-interface/) [![PHP](https://img.shields.io/packagist/php-v/imponeer/toarray-interface.svg)](http://php.net) 
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

## Example

```php5

use Imponeer/ToArrayInterface;

class DummyObject implements ToArrayInterface {

   /**
    * Converts object to array
    *
    * @return array
    */
   public function toArray() {
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

If you want to add some functionality or fix bugs, you can fork, change and create pull request. If you not sure how this works, try [interactive GitHub tutorial](https://try.github.io).

If you found any bug or have some questions, use [issues tab](https://github.com/imponeer/toarray-interface/issues) and write there your questions.
