<?php

namespace Phphleb\TestO\Di;

use Hleb\Base\Controller;

class ControllerBeforeActionExample extends Controller
{
   public string $data = "";

   protected function beforeAction(): void
   {
     $this->data = 'OK';
   }
}