<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Put241_a01c92cab43628
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
          'PUT',
          'OPTIONS',
      ],
      'data' =>  [
          'route' => 'test-address-static/controller/{first}/{second}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-address-static/controller/{first}/{second}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0AddressController',
          'class-method' => 'getAddressStatic',
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
