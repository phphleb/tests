<?php

declare(strict_types=1);

namespace Phphleb\Tests\Logger;

class TestLogger implements \Hleb\Main\Logger\LoggerInterface
{
    /**
     * @inheritDoc
     */
    public function emergency(string|\Stringable $message, array $context = []): void
    {
        echo "EMERGENCY: $message";
    }

    /**
     * @inheritDoc
     */
    public function alert(string|\Stringable $message, array $context = []): void
    {
        echo "ALERT: $message";
    }

    /**
     * @inheritDoc
     */
    public function critical(string|\Stringable $message, array $context = []): void
    {
        echo "CRITICAL: $message";
    }

    /**
     * @inheritDoc
     */
    public function error(string|\Stringable $message, array $context = []): void
    {
        echo "ERROR: $message";
    }

    /**
     * @inheritDoc
     */
    public function warning(string|\Stringable $message, array $context = []): void
    {
        echo "WARNING: $message";
    }

    /**
     * @inheritDoc
     */
    public function notice(string|\Stringable $message, array $context = []): void
    {
        echo "NOTICE: $message";
    }

    /**
     * @inheritDoc
     */
    public function info(string|\Stringable $message, array $context = []): void
    {
        echo "INFO: $message";
    }

    /**
     * @inheritDoc
     */
    public function debug(string|\Stringable $message, array $context = []): void
    {
        echo "DEBUG: $message";
    }

    /**
     * @inheritDoc
     */
    public function log(mixed $level, string|\Stringable $message, array $context = []): void
    {
        echo "LOG($level): $message";
    }
}