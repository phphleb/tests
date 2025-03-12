<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2Options375_91ea6597642498
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
          'route' => 'test-module/base-template/verbs',
          'view' => null,
      ],
      'actions' =>  [],
      'full-address' => 'test-module/base-template/verbs',
      'module' =>  [
          'method' => 'module',
          'name' => 'example-test',
          'class' => 'Modules\ExampleTest\Controllers\TemplateModuleController',
          'class-method' => '[verb]',
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
