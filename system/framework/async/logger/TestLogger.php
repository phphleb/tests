<?php

declare(strict_types=1);

namespace Phphleb\Tests\AsyncLogger;

use Hleb\HttpMethods\Response;

class TestLogger implements \Hleb\Main\Logger\LoggerInterface
{
    /**
     * @inheritDoc
     */
    public function emergency(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("EMERGENCY: $message");
    }

    /**
     * @inheritDoc
     */
    public function alert(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("ALERT: $message");
    }

    /**
     * @inheritDoc
     */
    public function critical(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("CRITICAL: $message");
    }

    /**
     * @inheritDoc
     */
    public function error(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("ERROR: $message");
    }

    /**
     * @inheritDoc
     */
    public function warning(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("WARNING: $message");
    }

    /**
     * @inheritDoc
     */
    public function notice(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("NOTICE: $message");
    }

    /**
     * @inheritDoc
     */
    public function info(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("INFO: $message");
    }

    /**
     * @inheritDoc
     */
    public function debug(string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("DEBUG: $message");
    }

    /**
     * @inheritDoc
     */
    public function log(mixed $level, string|\Stringable $message, array $context = []): void
    {
        throw new AsyncLoggerTestException("LOG($level): $message");
    }
}