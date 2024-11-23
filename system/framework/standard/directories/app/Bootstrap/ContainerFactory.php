<?php

declare(strict_types=1);

namespace App\Bootstrap;

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
            default => null
        };
        self::register(DateTime::class);

        if (is_callable(self::$singletons[$id])) {
            self::$singletons[$id] = self::$singletons[$id]();
        }

        return self::$singletons[$id];
    }

    #[\Override]
    public static function setSingleton(string $id, object|callable|null $value): void
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
