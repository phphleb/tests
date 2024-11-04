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
final class HL2Get154_874a4f65941454
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
          'route' => 'test-middleware/json',
          'view' => 'ERROR-GET-DATA',
      ],
      'actions' =>  [],
      'full-address' => 'test-middleware/json',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'getJson',
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
