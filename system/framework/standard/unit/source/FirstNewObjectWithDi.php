<?php

namespace Phphleb\Tests;

use Hleb\Reference\Interface\Arr;

class FirstNewObjectWithDi
{
   public function __construct()
   {
   }

   public function getTime(\DateTime $time): string
   {
       return $time->format('d/m/Y');
   }

   public function getFromContainerAndDefault(Arr $arr, string $value = 'qwerty'): array
   {
       return [
           'arr' => $arr::class,
           'value' => $value,
       ];
   }

   public static function checkStaticInvoice(int $value = 1000): int
   {
       return $value;
   }

    public static function checkOtherContainerObject(FifthNewObjectWithDi $obj): array
    {
        return [
            $obj->arr::class,
            $obj->dateTime::class,
        ];
    }

   public function result(): array
   {
       return [];
   }
}