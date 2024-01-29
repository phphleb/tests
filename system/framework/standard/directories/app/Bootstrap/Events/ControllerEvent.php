<?php

declare(strict_types=1);

namespace App\Bootstrap\Events;

use App\Controllers\Event\HTestEventController;
use DateTime;
use Hleb\Base\Event;
use Hleb\Constructor\Attributes\Dependency;

#[Dependency]
final class ControllerEvent extends Event
{
    public function __construct(private readonly DateTime $time, array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @see Event
     */
    #[\Override]
    public function before(string $class, string $method, array $arguments): array|false
    {
        if ($class === HTestEventController::class && $method === 'index') {
            $arguments = [
                'time' => DateTime::createFromFormat('Y-m-d', '1970-12-10'),
                'test' => 'changed',
                'constructTime' => $this->time::class,
            ];
        }
        if ($class === HTestEventController::class && $method === 'testEventAfter2') {
            echo 'AND_BEFORE2_';
        }
        if ($class === HTestEventController::class && $method === 'checkController1') {
            echo '{EV-CNT-1-BEFORE}';
        }
        if ($class === HTestEventController::class && $method === 'testEventArgs1') {
            return ['arg' => '[arg]'];
        }
        if ($class === HTestEventController::class && $method === 'testEventArgs2') {
            return array_merge($arguments, ['arg' => '{arg2}']);
        }
        return $arguments;
    }

    public function after(string $class, string $method, mixed &$result): bool
    {
        if ($class === HTestEventController::class && $method === 'testEventAfterOnce1') {
           echo 'AND_AFTER';
        }
        if ($class === HTestEventController::class && $method === 'testEventAfter2') {
            echo 'AND_AFTER2';
        }
        if ($class === HTestEventController::class && $method === 'checkController1') {
            echo '{EV-CNT-1-AFTER}';
        }
        return true;
    }
}