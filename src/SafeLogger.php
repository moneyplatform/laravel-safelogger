<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger;

use Illuminate\Support\Facades\Log;
use Moneyplatform\SafeLogger\Helpers\LogHelper;
use Throwable;

/**
 * Class SafeLogger
 *
 * @method void debug(...$params)
 * @method void info(...$params)
 * @method void notice(...$params)
 * @method void warning(...$params)
 * @method void error(...$params)
 * @method void alert(...$params)
 * @method void critical(...$params)
 * @method void emergency(...$params)
 */
class SafeLogger
{
    /* @var int */
    private int $contextDepth = 3;

    /* @var array */
    private array $hiddenFields = [];

    /* @var string */
    private string $messagePrefix = '';

    public function __call(string $name, array $params = []): void
    {
        $message = $this->getMessageParam($params);
        $context = $this->getContextParam($params);

        $this->write($name, $message, $context);
    }

    public function setHiddenFields(array $hiddenFields): self
    {
        $this->hiddenFields = $hiddenFields;

        return $this;
    }

    public function setMessagePrefix(string $messagePrefix): self
    {
        $this->messagePrefix = $messagePrefix;

        return $this;
    }

    public function setContextDepth(int $contextDepth): void
    {
        $this->contextDepth = $contextDepth;
    }

    protected function hydrateLog(array $context = []): array
    {
        return $context;
    }

    protected function addLogPrefix(string $message = ''): string
    {
        return trim($this->messagePrefix.' '.$message);
    }

    private function write(string $level, string $message = '', array $context = []): void
    {
        $message = $this->addLogPrefix($message);
        $context = $this->filterLog($context);
        $context = $this->hydrateLog($context);

        Log::log($level, $message, $context);
    }

    private function filterLog(array $context = []): array
    {
        try {
            if (count($context)) {
                $context = LogHelper::filterAndToArray(
                    $context,
                    $this->contextDepth,
                    $this->hiddenFields
                );
            }

            ksort($context);
        } catch (Throwable $exception) {
            $this->write('error', 'SafeLogger error', [
                $exception->getMessage(),
                $exception->getTraceAsString(),
            ]);
        }

        return $context;
    }

    private function getMessageParam(array $params): string
    {
        $message = '';
        foreach ($params as $param) {
            if (is_string($param)) {
                $message .= ' '.$param;
            }
        }

        return trim($message);
    }

    private function getContextParam(array $params): array
    {
        $context = [];
        foreach ($params as $param) {
            if (is_array($param)) {
                $context = array_merge($context, $param);
            }
            if ($param instanceof Throwable) {
                $context['errorMessage'] = $param->getMessage();
                $context['trace'] = $param->getTraceAsString();
            }
        }

        return $context;
    }
}
