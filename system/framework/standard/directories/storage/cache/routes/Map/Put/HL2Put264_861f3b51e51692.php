<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Put264_861f3b51e51692
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
          'route' => 'example-view-code/controller/{code}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'example-view-code/controller/{code}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0ViewController',
          'class-method' => 'index',
          'code' => '@/routes/map.php:348',
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
