<?php

declare(strict_types=1);

namespace App\Bootstrap;

use App\Bootstrap\Services\AuthowireTest1;
use App\Bootstrap\Services\AuthowireTest2;
use App\Bootstrap\Services\AutowireTestInterface;
use DateTime;
use Hleb\Constructor\Attributes\Dependency;
use Hleb\Constructor\Containers\BaseContainerFactory;
use Hleb\Reference\DbInterface;

#[Dependency]
final class ContainerFactory  extends BaseContainerFactory
{
    public static function getSingleton(string $id): mixed
    {
        self::has($id) or self::$singletons[$id] = match ($id) {
            DateTime::class => new DateTime(),

            AutowireTestInterface::class => new AuthowireTest1(),
            AuthowireTest2::class => self::getLazyObject(AuthowireTest2::class),

            default => null
        };
        self::register(DateTime::class);
        self::register(AutowireTestInterface::class);
        self::register(AuthowireTest2::class);

        if (self::$singletons[$id] instanceof \Closure) {
            self::$singletons[$id] = self::$singletons[$id]();
        }

        return self::$singletons[$id];
    }

    #[\Override]
    public static function setSingleton(string $id, object|null $value): void
     {
        parent::setSingleton($id, $value);
     }

    #[\Override]
    public static function rollback(): void
    {
        BaseContainer::instance()->get(DbInterface::class)::rollback();

        self::$singletons = [];
        self::$customServiceKeys = null;
    }
}
