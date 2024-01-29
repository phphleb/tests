<?php

namespace Phphleb\Tests;

namespace Phphleb\Tests;

use Hleb\Reference\CsrfInterface;

class MockContainerCsrf implements CsrfInterface
{

    #[\Override] public function token(): string
    {
        return 'example_token';
    }

    #[\Override] public function field(): string
    {
        return '<b>example_token</b>';
    }

    #[\Override] public function validate(?string $key): bool
    {
        return true;
    }

    #[\Override] public function discover(): string|null
    {
        return true;
    }

    #[\Override] public static function rollback(): void
    {
    }
}