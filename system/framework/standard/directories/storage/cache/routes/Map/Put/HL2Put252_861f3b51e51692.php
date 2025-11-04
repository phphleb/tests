<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Put252_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'any',
      'types' =>  [
          'GET',
          'POST',
          'DELETE',
          'PUT',
          'PATCH',
          'OPTIONS',
          'HEAD',
      ],
      'data' =>  [
          'route' => 'test-functions/controller/{method}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-functions/controller/{method}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0FuncController',
          'class-method' => 'get<method>',
          'code' => '@/routes/map.php:329',
      ],
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
