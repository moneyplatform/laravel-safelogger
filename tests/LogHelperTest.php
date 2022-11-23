<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Test;

use Moneyplatform\SafeLogger\Helpers\LogHelper;
use Moneyplatform\SafeLogger\Tests\PseudoModels\Customer;
use Moneyplatform\SafeLogger\Tests\TestCase;
use stdClass;

/**
 * Class LogHelperTest
 */
class LogHelperTest extends TestCase
{
    /**
     * @group smoke
     */
    public function testFilterAndToArrayInputArray(): void
    {
        $result = LogHelper::filterAndToArray(['password' => '123', 'username' => 'user']);

        self::assertIsArray($result);
        self::assertNotEmpty($result);
        self::assertArrayNotHasKey('password', $result);
    }

    /**
     * @group smoke
     */
    public function testFilterAndToArrayInputModel(): void
    {
        $result = LogHelper::filterAndToArray([
            'password' => '123',
            'customer' => new Customer('Vasya', '03', 666),
            'object' => new stdClass(),
            'deepObjectWrp' => [
                'deepObject' => new stdClass(),
            ],
        ]);

        self::assertIsArray($result);
        self::assertNotEmpty($result);
        self::assertArrayNotHasKey('password', $result);
        self::assertEquals(
            [
                'name' => 'Vasya',
                'phone' => '03',
                'weight' => 666,
            ],
            $result['customer']
        );
        self::assertArrayHasKey('customer', $result);
        self::assertEquals('<object>', $result['deepObjectWrp']['deepObject']);
    }

    /**
     * @group smoke
     */
    public function testFilterAndToArrayInputNull(): void
    {
        self::assertNull(LogHelper::filterAndToArray(null));
    }

    /**
     * init test
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }
}
