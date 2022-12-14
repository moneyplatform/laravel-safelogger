<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Tests;

use Moneyplatform\SafeLogger\SafeLoggerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            SafeLoggerServiceProvider::class,
        ];
    }

    /**
     * @param $app
     * @return void
     */
    public function getEnvironmentSetUp($app): void
    {
    }
}
