<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options187_861f3b51e51692
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
          'route' => 'test-route-name/controller',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-route-name/controller',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0BaseController',
          'class-method' => 'getName',
          'code' => '@/routes/map.php:245',
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
