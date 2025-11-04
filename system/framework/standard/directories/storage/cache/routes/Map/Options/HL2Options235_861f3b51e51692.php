<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options235_861f3b51e51692
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
          'route' => 'dinamic-check-address/where/{first}/{second}',
          'view' => 'NAME-DATA-SUCCESS',
      ],
      'actions' =>  [],
      'full-address' => 'dinamic-check-address/where/{first}/{second}',
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
