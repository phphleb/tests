<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get161_a01c92cab43628
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
          'route' => 'test-middleware/integer',
          'view' => 'INTEGER-GET-DATA',
      ],
      'actions' =>  [],
      'full-address' => 'test-middleware/integer',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'getInt',
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
