<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options277_91ea6597642498
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'any',
      'types' =>  [
          'GET',
          'POST',
          'DELETE',
          'PUT',
          'PATCH',
          'OPTIONS',
          'HEAD',
      ],
      'data' =>  [
          'route' => 'set-route-version',
          'view' => 'v2',
      ],
      'actions' =>  [],
      'full-address' => 'set-route-version',
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
