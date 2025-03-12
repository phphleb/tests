<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options314_91ea6597642498
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
          'route' => 'di/controller/methods/manyArgs',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'di/controller/methods/manyArgs',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Di\HTestDiController',
          'class-method' => 'manyArgs',
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
