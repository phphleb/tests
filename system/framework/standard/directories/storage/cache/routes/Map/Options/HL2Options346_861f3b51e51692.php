<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options346_861f3b51e51692
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
          'route' => 'test-controller-method-name/controller',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-controller-method-name/controller',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0BeforeActionController',
          'class-method' => 'methodNameSuccess',
          'code' => '@/routes/action/main.php:9',
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
