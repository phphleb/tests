<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options2_f84227bb51399
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
          'route' => 'test-session/controller',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-session/controller',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0AsyncSessionController',
          'class-method' => 'setSession',
          'code' => '@/routes/map.php:10',
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
