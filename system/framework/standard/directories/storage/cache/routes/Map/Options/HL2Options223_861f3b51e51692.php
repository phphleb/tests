<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options223_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'get',
      'types' =>  [
          'GET',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => 'test-request/controller/get',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-request/controller/get',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0RequestController',
          'class-method' => 'getRequestList',
          'code' => '@/routes/map.php:292',
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
