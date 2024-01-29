<?php

declare(strict_types=1);

namespace App\Controllers\Di;

use Hleb\Base\Controller;
// Проверка DI для контроллера без конструктора.
class HTestDiControllerEmptyConstruct extends Controller
{
   public function notUsed(): string
   {
        return gettype($this->config);
   }
}