<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options296_a01c92cab43628
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'match',
      'types' =>  [
          'GET',
          'POST',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => 'alias-3/{id}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'prefix/alias-3/{id}',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestAliasMiddleware',
              'class-method' => 'index',
              'from-group' => true,
              'related-data' =>  [],
          ],
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestAliasMiddleware',
              'class-method' => 'index',
              'from-group' => false,
              'related-data' =>  [],
          ],
      ],
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0AliasRouteController',
          'class-method' => 'action<id>',
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
