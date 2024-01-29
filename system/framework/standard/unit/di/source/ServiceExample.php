<?php

namespace Phphleb\TestO\Di;

use Hleb\Reference\LogReference;

class ServiceExample
{
  public function __construct(public LogReference $log, public string $test = 'default')
  {
  }
}