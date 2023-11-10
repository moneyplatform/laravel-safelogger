<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Tests;

use Moneyplatform\SafeLogger\SafeLoggerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            SafeLoggerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
    }
}
