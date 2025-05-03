<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options168_a01c92cab43628
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
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'example',
              'from-group' => false,
              'related-data' =>  [],
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
              'class-method' => 'example',
              'from-group' => false,
              'related-data' =>  [],
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\Dir\NestedMiddleware',
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
