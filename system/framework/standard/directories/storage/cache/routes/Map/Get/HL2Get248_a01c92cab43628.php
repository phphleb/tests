<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get248_a01c92cab43628
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
          'route' => 'test-dto/controller/get',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-dto/controller/get',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0DtoController',
          'class-method' => 'getDtoData',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\DtoMiddleware',
              'class-method' => 'setData',
              'from-group' => false,
              'related-data' =>  [],
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\DtoMiddleware',
              'class-method' => 'setData',
              'from-group' => false,
              'related-data' =>  [],
          ],
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
