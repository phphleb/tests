<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Post67_861f3b51e51692
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
          'route' => 'dinamic-where-replace/method/{first}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'dinamic-where-replace/method/{first}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Dir\[verb]\H2bTest0DynamicParamController',
          'class-method' => '[verb]From<first>[verb]',
          'code' => '@/routes/map.php:108',
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
