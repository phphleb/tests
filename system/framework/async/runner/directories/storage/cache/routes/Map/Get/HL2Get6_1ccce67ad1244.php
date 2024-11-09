<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
*/

/**
* @internal
*/
final class HL2Get6_1ccce67ad1244
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
          'route' => 'test-cookies/controller',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-cookies/controller',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0AsyncSessionController',
          'class-method' => 'setCookies',
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
