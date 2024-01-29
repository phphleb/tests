<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;

class HTest0InsertController extends Controller
{
   public function get(): string
   {
       return 'INSERT-CONTROLLER-DATA';
   }
}