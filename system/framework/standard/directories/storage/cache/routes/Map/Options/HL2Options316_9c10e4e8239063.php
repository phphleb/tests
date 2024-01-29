<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
*/

/**
* @internal
*/
final class HL2Options316_9c10e4e8239063
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
          'route' => 'test-controller-method-name/controller/container',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-controller-method-name/controller/container',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0BeforeActionController',
          'class-method' => 'methodNameFromContainerSuccess',
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
