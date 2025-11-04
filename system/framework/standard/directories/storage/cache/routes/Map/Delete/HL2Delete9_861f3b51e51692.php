<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Delete9_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'fallback',
      'types' =>  [
          'DELETE',
          'OPTIONS',
      ],
      'code' => '@/routes/map.php:254',
      'data' =>  [
          'route' => '*',
          'view' => '404.NOT_FOUND_FALLBACK-DELETE',
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
