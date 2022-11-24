<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Taps;

use Psr\Log\LoggerInterface;

/**
 * Class AddAppName
 *
 * @codeCoverageIgnore
 */
class AddAppName
{
    /**
     * @param  LoggerInterface  $logger
     */
    public function __invoke(LoggerInterface $logger): void
    {
        //@phpstan-ignore-next-line
        foreach ($logger->getHandlers() as $handler) {
            $handler->pushProcessor([$this, 'processLogRecord']);
        }
    }

    /**
     * @param  array  $record
     * @return array
     */
    public function processLogRecord(array $record): array
    {
        $record['appname'] = config('app.name');

        return $record;
    }
}
