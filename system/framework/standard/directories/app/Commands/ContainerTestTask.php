<?php

namespace App\Commands;

use Hleb\Base\Task;
use Hleb\Reference\CacheInterface;
use Hleb\Reference\DbInterface;
use Hleb\Reference\DebugInterface;
use Hleb\Reference\LogInterface;
use Hleb\Reference\RequestInterface;
use Hleb\Reference\SettingInterface;

class ContainerTestTask extends Task
{
    protected function run(): array
    {
        return [
            'has.db' => $this->container->has(DbInterface::class),
            'has.debug' => $this->container->has(DebugInterface::class),
            'has.log' => $this->container->has(LogInterface::class),
            'has.cache' => $this->container->has(CacheInterface::class),
            'has.settings' => $this->container->has(SettingInterface::class),
            'has.request' => $this->container->has(RequestInterface::class),
        ];
    }
}