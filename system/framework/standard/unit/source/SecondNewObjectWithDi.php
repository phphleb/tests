<?php

namespace Phphleb\Tests;

use Hleb\Reference\Interface\Arr;

class SecondNewObjectWithDi
{
   public function __construct(private \DateTime $dateTime, private Arr $arr)
   {
   }

   public function result(): array
   {
       return [
           $this->dateTime::class,
           $this->arr::class,
       ];
   }
}