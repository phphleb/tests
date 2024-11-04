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
final class HL2Options358_874a4f65941454
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
          'route' => 'header-controller/{value}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'header-controller/{value}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0HeaderController',
          'class-method' => '<value>',
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
