<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get371_861f3b51e51692
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
          'code' => '@/routes/event/main.php:30',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Event\EventMiddleware',
              'class-method' => 'testMdEventArgs1',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/event/main.php:31',
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
