<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get345_837c8d6ef41993
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
          'route' => 'test-event/controller/module/event/1',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-event/controller/module/event/1',
      'module' =>  [
          'method' => 'module',
          'name' => 'example-test',
          'class' => 'Modules\ExampleTest\Controllers\Event\EventModuleController',
          'class-method' => 'eventAfterOnce1',
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
