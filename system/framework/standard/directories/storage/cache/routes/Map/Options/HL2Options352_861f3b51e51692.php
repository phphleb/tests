<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options352_861f3b51e51692
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
          'route' => 'psr/controller/container/{number}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'psr/controller/container/{number}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\Psr\HTestPsrController',
          'class-method' => 'getContainerV<number>',
          'code' => '@/routes/psr/main.php:7',
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
