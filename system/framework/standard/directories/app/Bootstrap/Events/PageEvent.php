<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;

#[Dependency]
final class PageEvent extends Event
{
    public function before(string $class, string $method, array $arguments, string $page): array|false
    {
        return $arguments;
    }
}