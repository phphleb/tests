<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options47_837c8d6ef41993
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
          'route' => 'dinamic/where/user/name/@{first}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'dinamic/where/user/name/@{first}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0DynamicValController',
          'class-method' => 'usingTemplate',
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
