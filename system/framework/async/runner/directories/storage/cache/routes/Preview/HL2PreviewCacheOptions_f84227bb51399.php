<?php

declare(strict_types=1);

/**
* This class is generated automatically. It will be changed during the update.
* 
* Этот класс сгенерирован автоматически. Он будет изменён при обновлении.
* 
* @internal
*/
final class HL2PreviewCacheOptions_f84227bb51399
{
    /**
    * @internal
    */
    private static array $data =[
       [
          'a' => 'test',
          'k' => 1,
          'f' => 'test',
          's' => 1,
      ],
       [
          'a' => 'test-session/controller',
          'k' => 2,
          'f' => 'test-session',
      ],
       [
          'a' => 'test-extended-session/controller/{num}',
          'k' => 4,
          'f' => 'test-extended-session',
          'd' => 1,
      ],
       [
          'a' => 'test-cookies/controller',
          'k' => 6,
          'f' => 'test-cookies',
      ],
       [
          'a' => 'example-subsequence/controller/{num}',
          'k' => 8,
          'f' => 'example-subsequence',
          'd' => 1,
      ],
       [
          'a' => 'test-rollback/controller/{level}',
          'k' => 10,
          'f' => 'test-rollback',
          'd' => 1,
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
