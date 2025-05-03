<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Post225_a01c92cab43628
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'post',
      'types' =>  [
          'POST',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => 'test-request/controller/post',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-request/controller/post',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0RequestController',
          'class-method' => 'getRequestList',
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
