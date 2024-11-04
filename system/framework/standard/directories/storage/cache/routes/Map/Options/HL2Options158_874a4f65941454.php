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
final class HL2Options158_874a4f65941454
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
          'route' => 'test-middleware-variable/get-method',
          'view' => 'SUCCESS-GET-TEXT',
      ],
      'actions' =>  [],
      'full-address' => 'test-middleware-variable/get-method',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'index',
              'from-group' => false,
              'related-data' =>  [],
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'example',
              'from-group' => false,
              'related-data' =>  [],
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'example',
              'from-group' => false,
              'related-data' =>  [],
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'example',
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
