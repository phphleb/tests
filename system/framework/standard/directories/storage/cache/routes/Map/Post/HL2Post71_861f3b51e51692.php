<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Post71_861f3b51e51692
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
          'route' => 'dinamic-where-replace/method-controller/{first}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'dinamic-where-replace/method-controller/{first}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Dir\[verb]\H2bTest0Dynamic[verb]Controller',
          'class-method' => '[verb]From<first>[verb]',
          'code' => '@/routes/map.php:114',
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
