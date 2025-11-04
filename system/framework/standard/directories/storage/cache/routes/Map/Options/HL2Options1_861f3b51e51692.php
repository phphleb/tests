<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options1_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'fallback',
      'types' =>  [
          'GET',
          'OPTIONS',
      ],
      'code' => '@/routes/map.php:250',
      'data' =>  [
          'route' => '*',
          'view' => '404.NOT_FOUND_FALLBACK-GET',
      ],
      'actions' =>  [],
      'full-address' => '*',
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
