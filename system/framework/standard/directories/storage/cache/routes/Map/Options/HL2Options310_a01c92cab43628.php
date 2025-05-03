<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options310_a01c92cab43628
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
          'route' => 'test-config/custom/value',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-config/custom/value',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0ConfigController',
          'class-method' => 'getCustomConfig',
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
