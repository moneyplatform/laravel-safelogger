<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Moneyplatform\SafeLogger\SafeLogger
 */
class SafeLogger extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Moneyplatform\SafeLogger\SafeLogger::class;
    }
}
