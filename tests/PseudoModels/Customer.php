<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Tests\PseudoModels;

/**
 * Class Customer
 */
class Customer
{
    public function __construct(public string $name, public string $phone, public int $weight)
    {
    }
}
