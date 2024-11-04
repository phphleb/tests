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
final class HL2Options390_874a4f65941454
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
          'route' => 'test-controller-response/{type}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-controller-response/{type}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0ResponseController',
          'class-method' => 'action<type>',
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
