<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options186_861f3b51e51692
{
    /**
    * @internal
    */
    private static array $data =[
      'method' => 'add',
      'name' => 'match',
      'types' =>  [
          'PUT',
          'DELETE',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => 'test-route-types/match',
          'view' => 'ROUTE-MATCH[PUT,DELETE]',
      ],
      'actions' =>  [],
      'full-address' => 'test-route-types/match',
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
