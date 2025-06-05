[![License](https://img.shields.io/github/license/imponeer/toarray-interface.svg?maxAge=2592000)](LICENSE)
[![GitHub release](https://img.shields.io/github/release/imponeer/toarray-interface.svg?maxAge=2592000)](https://github.com/imponeer/toarray-interface/releases) [![PHP](https://img.shields.io/packagist/php-v/imponeer/toarray-interface.svg)](http://php.net)
[![Packagist](https://img.shields.io/packagist/dm/imponeer/toarray-interface.svg)](https://packagist.org/packages/imponeer/toarray-interface)

# ToArray Interface

There have been several attempts to introduce a standard `toArray` method or interface in PHP:

- The first attempt was in 2012, when an [RFC proposed adding several magic methods to PHP, including `__toArray`, `__toInt()`, `__toFloat()`, `__toScalar()`, and `__toBool()`](https://wiki.php.net/rfc/object_cast_to_types). This proposal failed before reaching the voting stage due to concerns about implementation details and lack of consensus.
- In 2019, a separate [RFC specifically focused on introducing only a `__toArray` method for objects](https://wiki.php.net/rfc/to-array). Unlike the broader 2012 proposal, this RFC aimed to standardize array conversion alone, but it also failed before reaching the voting stage due to lack of support and unresolved concerns—particularly that the `__toArray` method did not specify what kind of array should be returned (e.g., associative or indexed), nor whether nested arrays or objects were allowed as values. One of the main unresolved questions was how to specify or standardize the format of the returned array in a way that would suit all use cases.
- Over the years, various frameworks and libraries (such as [Laravel's illuminate/contracts](https://packagist.org/packages/illuminate/contracts)) have introduced their own `toArray` conventions, but these are not universal and often come with additional dependencies.
- As of now, neither PHP itself nor the [PHP-FIG group](https://www.php-fig.org/psr/) has adopted an official standard for object-to-array conversion.

This package was created to address this gap: it provides a minimal Composer package containing only the `ToArrayInterface`. Use it when you need to ensure an object can be converted to an array via a `toArray` method, without introducing unnecessary dependencies.

## Installation

To install and use this package, use [Composer](https://getcomposer.org):

```bash
composer require imponeer/toarray-interface
```

Alternatively, manually include the files from the `src/` directory.

**Note:** For PHP 5 projects, use [version 1.0 of this library](https://packagist.org/packages/imponeer/toarray-interface#1.0.0).

## Example

```php
use Imponeer\ToArrayInterface;

class DummyObject implements ToArrayInterface {

    /**
     * Converts object to array
     *
     * @return array<string, mixed>
     */
    public function toArray(): array {
        return [
            'hash' => sha1(time()),
        ];
    }
}

$instance = new DummyObject();
if ($instance instanceof ToArrayInterface) {
    var_dump($instance->toArray());
}
```

## Documentation

This repository features an automatically updated [GitHub Wiki](https://github.com/imponeer/toarray-interface/wiki) containing up-to-date code documentation generated from the source. You can use the Wiki to explore interfaces, methods, and other technical details about the project.

## Alternatives

Because PHP does not yet have a standard way to convert objects to arrays, many alternative libraries exist, each trying to solve the same problem in its own way. Depending on your specific needs - such as recursion support, fluent APIs, strict interface contracts, or framework integration - you may find one of these packages better suited for your project.

Below is a curated list of popular alternatives, showcasing different approaches to object-to-array conversion in PHP:

| Package                                                                                           | PHP Version | Features                                             | 
| ------------------------------------------------------------------------------------------------- | ----------- | ---------------------------------------------------- | 
| [inspirum/arrayable](https://github.com/inspirum/arrayable-php)                                 | [![PHP](https://img.shields.io/packagist/dependency-v/inspirum/arrayable/php)](http://php.net)        | Recursive conversion, helper functions, base classes | 
| [dmytrof/array-convertible](https://github.com/dmytrof/ArrayConvertible)           | [![PHP](https://img.shields.io/packagist/dependency-v/dmytrof/array-convertible/php)](http://php.net)        | Lightweight, nested conversion, simple interface     | 
| [rexlabsio/array-object-php](https://github.com/rexlabsio/array-object-php)                     | [![PHP](https://img.shields.io/packagist/dependency-v/rexlabs/array-object/php)](http://php.net)        | Fluent interface, `toArray()` and `toJson()` methods | 
| [php-extended/php-arrayable-interface](https://gitlab.com/php-extended/php-arrayable-interface) | [![PHP](https://img.shields.io/packagist/dependency-v/php-extended/php-arrayable-interface/php)](http://php.net)        | Interface-only, strict contract definition           |

Missing an alternative? Submit a [pull request](https://github.com/imponeer/toarray-interface/compare) to get it added.

## Development

To maintain code quality, this project uses:

- [PHP_CodeSniffer (phpcs)](https://github.com/squizlabs/PHP_CodeSniffer) for coding standards.
- [PHPStan](https://phpstan.org/) for static analysis.

### Running PHPCS

Run the following command to check code style:

```bash
vendor/bin/phpcs
```

### Running PHPStan

Run the following command to perform static analysis:

```bash
vendor/bin/phpstan analyse
```

Refer to `phpcs.xml` and `phpstan.neon` for configuration details.

## How to contribute?

Contributions are welcome! To contribute:

1. Fork this repository on GitHub.
2. Create a new branch for your feature or bugfix.
3. Make your changes and commit them with clear messages.
4. Push your branch to your fork and open a Pull Request.

If you find a bug or have a question, please use the [issues tab](https://github.com/imponeer/toarray-interface/issues).
