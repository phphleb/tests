<?php

namespace App\Bootstrap;

use Hleb\Constructor\Attributes\Dependency;
use Hleb\Constructor\Containers\CoreContainerInterface;

#[Dependency]
interface ContainerInterface extends CoreContainerInterface
{
}