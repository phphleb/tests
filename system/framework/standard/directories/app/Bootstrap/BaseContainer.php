<?php

declare(strict_types=1);

namespace App\Bootstrap;

use Hleb\Constructor\Attributes\Dependency;
use Hleb\Constructor\Containers\CoreContainer;

#[Dependency]
final class BaseContainer extends CoreContainer implements ContainerInterface
{
    final public function get(string $id): mixed
    {
        return ContainerFactory::getSingleton($id) ?? match ($id) {

            default => parent::get($id),
        };
    }
}