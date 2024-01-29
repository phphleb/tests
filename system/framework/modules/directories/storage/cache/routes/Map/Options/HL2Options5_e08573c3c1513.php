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
final class HL2Options5_e08573c3c1513
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
          'route' => 'test-module-middleware',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-module-middleware',
      'module' =>  [
          'method' => 'module',
          'name' => 'test',
          'class' => 'Products\Test\Controllers\HlTestMiddlewareModuleController',
          'class-method' => 'index',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'Products\Test\Middlewares\HlTestMiddleware',
              'class-method' => 'index',
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
