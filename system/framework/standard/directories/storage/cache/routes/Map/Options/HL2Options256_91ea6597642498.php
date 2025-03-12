<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options256_91ea6597642498
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
          'route' => 'example-test-ending/success/{first}/{second}/{end?}',
          'view' => 'ENDING-SUCCESS',
      ],
      'actions' =>  [],
      'full-address' => 'example-test-ending/success/{first}/{second}/{end?}',
  ];


    /**
    * @internal
    */
    public static function getData(): array
    {
        return self::$data;
    }
}
