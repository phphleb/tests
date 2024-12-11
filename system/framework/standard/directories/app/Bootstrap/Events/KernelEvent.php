<?php

namespace App\Bootstrap\Events;

use Hleb\Reference\Interface\Request;

class KernelEvent
{
    public function __construct(private readonly Request $request)
    {
    }

    public function before(): bool
    {
        return true; // Continue execution
    }
}
