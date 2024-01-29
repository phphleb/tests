<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;

class HTest0ConfigController extends Controller
{
    public function getCustomConfig(): string
    {
        return config('custom', 'param');
    }

}