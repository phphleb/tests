<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options157_91ea6597642498
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
          'route' => 'test-middleware/data',
          'view' => 'SUCCESS-GET-DATA',
      ],
      'actions' =>  [],
      'full-address' => 'test-middleware/data',
      'middlewares' =>  [
           [
              'method' => 'middleware',
              'class' => 'App\Middlewares\HlTestExampleMiddleware',
              'class-method' => 'getData',
              'from-group' => false,
              'related-data' =>  [
                  'param1' => '1001',
                  'param2' => 3.5,
              ],
          ],
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
