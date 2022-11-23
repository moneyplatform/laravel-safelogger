# Logging and logs filtering routines in one place

[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/moneyplatform/laravel-safelogger/run-tests?label=tests)](https://github.com/moneyplatform/laravel-safelogger/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/moneyplatform/laravel-safelogger/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/moneyplatform/laravel-safelogger/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)

## Installation

You can install the package via composer:

```bash
composer require moneyplatform/laravel-safelogger
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-safelogger-config"
```

## Usage

```php
$safeLogger = new Moneyplatform\SafeLogger();
echo $safeLogger->error('Hello, World!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [alex14v](https://github.com/alex14v)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
