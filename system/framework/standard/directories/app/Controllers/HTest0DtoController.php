<?php

declare(strict_types=1);

namespace App\Controllers;

use Hleb\Base\Controller;

class HTest0DtoController extends Controller
{
    public function getDtoData(): array
    {
        $dto = $this->container->dto();
        $value = $dto->get('test');
        $dto->set('simple', 'TEST-DTO-VALUE');
        $list = $dto->list();
        $dto->clear();
        $afterClearDto = $dto->list();
       return [
           'data' => $value,
           'list' => $list,
           'list-after-clear' => $afterClearDto,
           ];
    }
}