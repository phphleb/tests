<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get4_1ccce67ad1244
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
          'route' => 'test-extended-session/controller/{num}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-extended-session/controller/{num}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0AsyncSessionController',
          'class-method' => '<num>',
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
