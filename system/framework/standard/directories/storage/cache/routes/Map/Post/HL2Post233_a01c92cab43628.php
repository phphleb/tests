<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Post233_a01c92cab43628
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'any',
      'types' =>  [
          'GET',
          'POST',
          'DELETE',
          'PUT',
          'PATCH',
          'OPTIONS',
          'HEAD',
      ],
      'data' =>  [
          'route' => 'test-request-static/array-param/{num}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-request-static/array-param/{num}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0RequestController',
          'class-method' => 'getParam<num>',
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
