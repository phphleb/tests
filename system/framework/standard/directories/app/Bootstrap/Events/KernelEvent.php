<?php

namespace App\Bootstrap\Events;

use Hleb\Base\Event;
use Hleb\Reference\Interface\Request;

class KernelEvent  extends Event
{
    public function __construct(private readonly Request $request)
    {
    }

    public function before(): bool
    {
        return true; // Continue execution
    }
}
