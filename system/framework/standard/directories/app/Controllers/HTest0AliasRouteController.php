<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;

class HTest0AliasRouteController extends Controller
{
   public function action1(): string
   {
       return 'ALIAS-CONTROLLER-DATA';
   }

    public function action2(int $id): string
    {
        return 'DATA-' . $id;
    }

    public function action3(int $id): string
    {
        return 'DATA-' . $id;
    }

    public function action4(int $id): string
    {
        return url('test.alias.origin.2', ['id' => (string)$id]);
    }

    public function action5(int $id): string
    {
        return url('test.alias.3', ['id' => (string)$id]);
    }
}
