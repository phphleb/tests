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
final class HL2Options136_874a4f65941454
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
          'route' => 'get-method',
          'view' => 'SUCCESS-GET-A-TEXT',
      ],
      'actions' =>  [],
      'full-address' => 'test-after-group/get-method',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'index',
              'from-group' => true,
              'related-data' =>  [],
          ],
      ],
      'middleware-after' =>  [
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterFirst',
              'from-group' => true,
              'related-data' =>  [],
          ],
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterSecond',
              'from-group' => true,
              'related-data' =>  [],
          ],
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterFirst',
              'from-group' => false,
              'related-data' =>  [],
          ],
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterSecond',
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
