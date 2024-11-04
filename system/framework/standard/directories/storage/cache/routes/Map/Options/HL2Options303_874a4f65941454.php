<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
*/

/**
* @internal
*/
final class HL2Options303_874a4f65941454
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
          'route' => 'di/controller/methods/twoArgs',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'di/controller/methods/twoArgs',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Di\HTestDiController',
          'class-method' => 'twoArgs',
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
