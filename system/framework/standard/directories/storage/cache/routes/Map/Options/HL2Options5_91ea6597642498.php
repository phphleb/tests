<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options5_91ea6597642498
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'fallback',
      'types' =>  [
          'PATCH',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => '*',
          'view' => '404.NOT_FOUND_FALLBACK-PATCH',
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
