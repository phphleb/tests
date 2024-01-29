<?php

namespace Phphleb\Tests;

use Hleb\Reference\Interface\Arr;

class FifthNewObjectWithDi
{
   public function __construct(public \DateTime $dateTime, public Arr $arr)
   {
   }
}