<?php

declare(strict_types=1);

namespace App\Bootstrap;

use Hleb\Constructor\Attributes\Dependency;
use Hleb\Constructor\Containers\BaseContainerFactory;
use Hleb\Reference\DbInterface;

#[Dependency]
final class ContainerFactory  extends BaseContainerFactory
{
    public static function getSingleton(string $id): mixed
    {
        self::has($id) or self::$singletons[$id] = match ($id) {

            default => null
        };

        return self::$singletons[$id];
    }

    #[\Override]
    public static function rollback(): void
    {
        BaseContainer::instance()->get(DbInterface::class)::rollback();

        self::$singletons = [];
    }
}