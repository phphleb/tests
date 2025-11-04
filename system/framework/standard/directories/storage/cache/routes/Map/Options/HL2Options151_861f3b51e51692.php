<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options151_861f3b51e51692
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
          'view' => 'SUCCESS-GET-B-TEXT',
      ],
      'actions' =>  [],
      'full-address' => 'test-before-group/get-method',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'index',
              'from-group' => true,
              'related-data' =>  [],
              'code' => '@/routes/map.php:192',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'example',
              'from-group' => true,
              'related-data' =>  [],
              'code' => '@/routes/map.php:193',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'first',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:195',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'second',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:196',
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
