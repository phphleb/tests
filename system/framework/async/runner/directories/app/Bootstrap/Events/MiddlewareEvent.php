<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;

#[Dependency]
final class MiddlewareEvent extends Event
{
   public function before(string $class, string $method, array $arguments, bool $after): array|false
   {
       return $arguments;
   }
}