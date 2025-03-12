<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options301_91ea6597642498
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
          'route' => 'test-container/controller/{type}/{num}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-container/controller/{type}/{num}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0ContainerController',
          'class-method' => 'action<type><num>',
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
