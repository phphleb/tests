<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options381_861f3b51e51692
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
          'route' => 'test-event/controller/module',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-event/controller/module',
      'module' =>  [
          'method' => 'module',
          'name' => 'example-test',
          'class' => 'Modules\ExampleTest\Controllers\Event\EventModuleController',
          'class-method' => 'index',
          'code' => '@/routes/event/main.php:42',
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
