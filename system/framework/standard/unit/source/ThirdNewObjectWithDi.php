<?php

namespace Phphleb\Tests;

class ThirdNewObjectWithDi
{
   public function __construct(private \DateTime $dateTime, private \DateTime $otherDateTime)
   {
   }

   public function result(): array
   {
       return [
           $this->dateTime->format('d/m/Y'),
           $this->otherDateTime::class,
       ];
   }
}