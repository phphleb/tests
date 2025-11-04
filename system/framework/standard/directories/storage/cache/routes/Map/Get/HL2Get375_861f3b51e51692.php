<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get375_861f3b51e51692
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
          'route' => 'test-event/controller/middleware/controller/1',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-event/controller/middleware/controller/1',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Event\HTestEventController',
          'class-method' => 'checkController1',
          'code' => '@/routes/event/main.php:35',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Event\EventMiddleware',
              'class-method' => 'checkMiddleware1',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/event/main.php:36',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Event\EventMiddleware',
              'class-method' => 'checkMiddleware2',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/event/main.php:37',
          ],
      ],
      'middleware-after' =>  [
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Event\EventMiddleware',
              'class-method' => 'checkMiddleware3',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/event/main.php:38',
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
