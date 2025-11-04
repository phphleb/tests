<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options342_861f3b51e51692
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
          'route' => 'test-cache/controller/{method}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-cache/controller/{method}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0CacheController',
          'class-method' => '<method>',
          'code' => '@/routes/cache/main.php:4',
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
