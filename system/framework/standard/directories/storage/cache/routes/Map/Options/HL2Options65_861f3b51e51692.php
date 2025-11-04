<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options65_861f3b51e51692
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
          'route' => 'dinamic-where-replace/{first}/{second}/{third}/{fourth}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'dinamic-where-replace/{first}/{second}/{third}/{fourth}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Dir\Get\<first>0Dynamic<second>Controller',
          'class-method' => '<third>From<fourth>',
          'code' => '@/routes/map.php:105',
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
