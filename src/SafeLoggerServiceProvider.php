<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SafeLoggerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-safelogger')
            ->hasConfigFile();
    }
}
