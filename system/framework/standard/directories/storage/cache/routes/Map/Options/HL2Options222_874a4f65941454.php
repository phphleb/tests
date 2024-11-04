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
final class HL2Options222_874a4f65941454
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
          'route' => 'test-request-static/controller/get',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-request-static/controller/get',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0RequestController',
          'class-method' => 'getRequestStatic',
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
