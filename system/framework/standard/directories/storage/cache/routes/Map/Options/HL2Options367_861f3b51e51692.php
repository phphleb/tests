<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options367_861f3b51e51692
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
          'route' => 'test-event/controller/middleware/2',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-event/controller/middleware/2',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Event\HTestEventController',
          'class-method' => 'testEventAfter3',
          'code' => '@/routes/event/main.php:25',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Event\EventMiddleware',
              'class-method' => 'beforeAfter2',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/event/main.php:26',
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
