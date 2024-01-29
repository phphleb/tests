<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;
use Hleb\Static\Settings;

/**
 * Тестирование функций фреймворка.
 */
class HTest0FuncController extends Controller
{
      public function getDebug(): int
      {
          return (int)hl_debug();
      }

      public function getConfig(): int
      {
          return (int)hl_config('debug');
      }

    public function getParam(): ?string
    {
        return param('method')?->asString();
    }

    public function getCreateDirectory(): ?string
    {
        $path = Settings::getPath('@/app/Controllers/DefaultController.php');

        return \hl_relative_path($path);
    }
}