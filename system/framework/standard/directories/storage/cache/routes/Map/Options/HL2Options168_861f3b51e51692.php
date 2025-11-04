<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options168_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'post',
      'types' =>  [
          'POST',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => 'test-middleware-variable/post-method',
          'view' => 'SUCCESS-POST-TEXT',
      ],
      'actions' =>  [],
      'full-address' => 'test-middleware-variable/post-method',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'index',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:218',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'example',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:219',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'example',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:220',
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'example',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/map.php:221',
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
