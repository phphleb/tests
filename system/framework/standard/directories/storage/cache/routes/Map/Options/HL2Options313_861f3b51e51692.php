<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options313_861f3b51e51692
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
          'code' => '@/routes/container/main.php:6',
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
