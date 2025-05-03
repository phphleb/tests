<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options349_a01c92cab43628
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
          'route' => 'test-event/controller/middleware/args1',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-event/controller/middleware/args1',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Event\HTestEventController',
          'class-method' => 'testEventArgs1',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Event\EventMiddleware',
              'class-method' => 'testMdEventArgs1',
              'from-group' => false,
              'related-data' =>  [],
          ],
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
