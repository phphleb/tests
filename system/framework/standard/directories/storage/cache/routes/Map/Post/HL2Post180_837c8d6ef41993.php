<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Post180_837c8d6ef41993
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
          'route' => 'test-route-types/match',
          'view' => 'ROUTE-MATCH[GET,POST]',
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
