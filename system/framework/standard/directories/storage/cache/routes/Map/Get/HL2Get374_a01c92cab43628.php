<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get374_a01c92cab43628
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
          'route' => 'test-event/controller/event/after/2',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-event/controller/event/after/2',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Event\HTestEventController',
          'class-method' => 'testEventAfter2',
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
