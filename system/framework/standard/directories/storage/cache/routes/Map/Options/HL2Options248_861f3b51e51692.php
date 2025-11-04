<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options248_861f3b51e51692
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
          'code' => '@/routes/map.php:324',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\DtoMiddleware',
              'class-method' => 'setData',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:325',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\DtoMiddleware',
              'class-method' => 'setData',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:326',
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
