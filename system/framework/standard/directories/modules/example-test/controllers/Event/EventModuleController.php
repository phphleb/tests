<?php

namespace Modules\ExampleTest\Controllers\Event;

use Hleb\Base\Module;

class EventModuleController extends Module
{
    public function index(\DateTime $time, string $test = 'default', string $constructTime = null, ?string $module = null): array
    {
        return [
            'time' => $time->format('Y-m-d'),
            'test' => $test,
            'constructTime' => $constructTime,
            'module' => $module,
        ];
    }

    public function eventAfterOnce1(): void
    {
       echo '_MODULE-1_';
    }

    public function eventAfterOnce2(): void
    {
        echo '_MODULE-2_';
    }

    public function eventArgs1(string $arg): void
    {
        echo "_MODULE-3_[$arg]";
    }
}
