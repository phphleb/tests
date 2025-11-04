<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Post402_861f3b51e51692
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
          'route' => 'alias-origin-2/{id}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'alias-origin-2/{id}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0AliasRouteController',
          'class-method' => 'action<id>',
          'code' => '@/routes/alias/main.php:11',
      ],
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestAliasMiddleware',
              'class-method' => 'index',
              'from-group' => false,
              'related-data' =>  [],
              'code' => '@/routes/alias/main.php:12',
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
