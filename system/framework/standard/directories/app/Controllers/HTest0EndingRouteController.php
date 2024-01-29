<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;

class HTest0EndingRouteController extends Controller
{
   public function index(): string
   {
       return 'CONTROLLER-ENDING-SUCCESS';
   }

    public function firstSecond(): string
    {
        return 'CONTROLLER-ENDING-NAME';
    }
}