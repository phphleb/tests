<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get259_a01c92cab43628
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
          'route' => 'example-test-ending-name/controller/{first}/{second}/{end?}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'example-test-ending-name/controller/{first}/{second}/{end?}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0EndingRouteController',
          'class-method' => '<first><second>',
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
