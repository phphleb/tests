<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Get134_861f3b51e51692
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
              'code' => '@/routes/map.php:175',
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
