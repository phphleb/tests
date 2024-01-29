<?php

namespace App\Models;

use Hleb\Base\Model;
use Hleb\Reference\DbInterface;
use Hleb\Reference\DebugInterface;
use Hleb\Reference\LogInterface;
use Hleb\Reference\RequestInterface;

class TestModel extends Model
{
    public static function getStaticData(): array
    {
        return [
            'has.db' => self::container()->has(DbInterface::class),
            'has.log' => self::container()->has(LogInterface::class),
            'has.debug' => self::container()->has(DebugInterface::class),
            'has.request' => self::container()->has(RequestInterface::class),
        ];
    }

    public function getData(): array
    {
        return [
            'system.settings' => self::settings()::class,
        ];
    }
}

