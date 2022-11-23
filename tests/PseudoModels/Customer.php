<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Tests\PseudoModels;

/**
 * Class Customer
 */
class Customer
{
    /**
     * @param  string  $name
     * @param  string  $phone
     * @param  int  $weight
     */
    public function __construct(public string $name, public string $phone, public int $weight)
    {
    }
}
