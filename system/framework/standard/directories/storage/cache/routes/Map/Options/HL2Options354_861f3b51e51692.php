<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options354_861f3b51e51692
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
          'route' => 'test-event/controller/index',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-event/controller/index',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Event\HTestEventController',
          'class-method' => 'index',
          'code' => '@/routes/event/main.php:8',
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
