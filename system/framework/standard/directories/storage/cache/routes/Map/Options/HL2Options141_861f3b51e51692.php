<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options141_861f3b51e51692
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
              'code' => '@/routes/map.php:179',
          ],
      ],
      'middleware-after' =>  [
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterFirst',
              'from-group' => true,
              'related-data' =>  [],
              'code' => '@/routes/map.php:180',
          ],
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterSecond',
              'from-group' => true,
              'related-data' =>  [],
              'code' => '@/routes/map.php:181',
          ],
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterFirst',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:183',
          ],
           [
              'method' => 'after',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'afterSecond',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:184',
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
