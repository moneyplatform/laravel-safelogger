<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Taps;

use Monolog\LogRecord;
use Psr\Log\LoggerInterface;

/**
 * Class AddAppName
 *
 * @codeCoverageIgnore
 */
class AddAppName
{
    public function __invoke(LoggerInterface $logger): void
    {
        //@phpstan-ignore-next-line
        foreach ($logger->getHandlers() as $handler) {
            $handler->pushProcessor([$this, 'processLogRecord']);
        }
    }

    public function processLogRecord(LogRecord $record): LogRecord
    {
        $record->extra['appname'] = config('app.name');

        return $record;
    }
}
