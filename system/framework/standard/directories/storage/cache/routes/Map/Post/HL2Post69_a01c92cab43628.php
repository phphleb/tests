<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Post69_a01c92cab43628
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
          'route' => 'dinamic-where-replace/method-once/{first}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'dinamic-where-replace/method-once/{first}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Dir\Post\H2bTest0DynamicParamController',
          'class-method' => '[verb]From<first>[verb]',
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
