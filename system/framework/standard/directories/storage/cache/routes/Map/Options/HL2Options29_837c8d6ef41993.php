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
final class HL2Options29_837c8d6ef41993
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
          'route' => 'example/test/controller/json',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'example/test/controller/json',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0BaseController',
          'class-method' => 'getJson',
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
