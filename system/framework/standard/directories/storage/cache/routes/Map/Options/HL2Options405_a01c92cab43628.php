<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options405_a01c92cab43628
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
          'route' => 'psr/controller/logger/{number}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'psr/controller/logger/{number}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Psr\HTestPsrController',
          'class-method' => 'getLoggerV<number>',
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
