<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use App\Commands\Example\Test2iod1276vc12cTask;
use App\Commands\Example\Test8iod1876vf18fTask;
use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;

#[Dependency]
final class TaskEvent extends Event
{
    public function before(string $class, string $method, array $arguments): array
    {
        if ([$class, $method] === [Test2iod1276vc12cTask::class, 'run']) {
            $arguments['arg'] = '[arg]';
        }
        if ([$class, $method] === [Test8iod1876vf18fTask::class, 'run']) {
            echo '_EVENT-BEFORE-2_';
            $arguments['arg'] = '[arg2]';
        }

        return $arguments;
    }

    public function after(string $class, string $method, mixed &$result): void
    {
        if ([$class, $method] === [Test8iod1876vf18fTask::class, 'run']) {
            echo '_EVENT-AFTER-2_';
        }
    }

    public function statusCode(string $class, string $method, int $code): int { return $code; }
}