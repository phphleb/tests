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
final class HL2Get111_9c10e4e8239063
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
          'route' => 'test-after/get-method',
          'view' => 'SUCCESS-GET-A-TEXT',
      ],
      'actions' =>  [],
      'full-address' => 'test-after/get-method',
      'middleware-after' =>  [
           [
              'method' => 'after',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'after',
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
