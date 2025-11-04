<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options268_861f3b51e51692
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
          'route' => 'example-subsequence/controller/{num}',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'example-subsequence/controller/{num}',
      'controller' =>  [
          'method' => 'controller',
          'class' => 'App\Controllers\HTest0ViewController',
          'class-method' => 'subsequence_<num>',
          'code' => '@/routes/map.php:354',
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
